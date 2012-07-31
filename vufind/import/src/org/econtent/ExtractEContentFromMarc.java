package org.econtent;

import java.io.FileReader;
import java.io.InputStream;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.HashSet;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import org.apache.log4j.Logger;
import org.econtent.GutenbergItemInfo;
import org.ini4j.Ini;
import org.vufind.MarcRecordDetails;
import org.vufind.IMarcRecordProcessor;
import org.vufind.IRecordProcessor;
import org.vufind.MarcProcessor;
import org.vufind.ProcessorResults;
import org.vufind.Util;

import au.com.bytecode.opencsv.CSVReader;
/**
 * Run this export to build the file to import into VuFind
 * SELECT econtent_record.id, sourceUrl, item_type, filename, folder INTO OUTFILE 'd:/gutenberg_files.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' FROM econtent_record INNER JOIN econtent_item on econtent_record.id = econtent_item.recordId  WHERE source = 'Gutenberg';

 * @author Mark Noble
 *
 */

public class ExtractEContentFromMarc implements IMarcRecordProcessor, IRecordProcessor{
	private Logger logger;
	private boolean reindexUnchangedRecords;
	private boolean checkOverDriveAvailability;
	private String econtentDBConnectionInfo;
	private String overdriveUrl;
	private ArrayList<GutenbergItemInfo> gutenbergItemInfo = null;
	
	private String vufindUrl;
	
	private PreparedStatement doesIlsIdExist;
	private PreparedStatement createEContentRecord;
	private PreparedStatement updateEContentRecord;
	private PreparedStatement deleteEContentItem;
	private PreparedStatement doesGutenbergItemExist;
	private PreparedStatement addGutenbergItem;
	private PreparedStatement updateGutenbergItem;
	
	private PreparedStatement existingEContentRecordLinks;
	private PreparedStatement addSourceUrl;
	private PreparedStatement updateSourceUrl;
	
	private PreparedStatement doesOverDriveIdExist;
	private PreparedStatement addOverDriveId;
	private PreparedStatement updateOverDriveId;
	
	public ProcessorResults results;
	
	private int numReindexingThreadsRunning;
	private long lastThreadStartTime; 
	
	public boolean init(Ini configIni, String serverName, long reindexLogId, Connection vufindConn, Connection econtentConn, Logger logger) {
		this.logger = logger;
		//Import a marc record into the eContent core. 
		if (!loadConfig(configIni, logger)){
			return false;
		}
		results = new ProcessorResults("Extract eContent from ILS", reindexLogId, vufindConn, logger);
		
		String reindexUnchangedRecordsVal = configIni.get("Reindex", "reindexUnchangedRecords");
		if (reindexUnchangedRecordsVal == null){
			logger.debug("Did not get a value for reindexUnchangedRecordsVal");
			reindexUnchangedRecords = true;
		}else{
			reindexUnchangedRecords = Boolean.parseBoolean(reindexUnchangedRecordsVal);
			logger.debug("reindexUnchangedRecords = " + reindexUnchangedRecords + " " + reindexUnchangedRecordsVal);
		}
		
		String checkOverDriveAvailabilityVal = configIni.get("Reindex", "checkOverDriveAvailability");
		if (checkOverDriveAvailabilityVal == null){
			checkOverDriveAvailability = true;
		}else{
			checkOverDriveAvailability = Boolean.parseBoolean(checkOverDriveAvailabilityVal);
		}
		
		try {
			//Connect to the vufind database
			doesIlsIdExist = econtentConn.prepareStatement("SELECT id from econtent_record WHERE ilsId = ?");
			createEContentRecord = econtentConn.prepareStatement("INSERT INTO econtent_record (ilsId, cover, source, title, subTitle, author, author2, description, contents, subject, language, publisher, edition, isbn, issn, upc, lccn, topic, genre, region, era, target_audience, sourceUrl, purchaseUrl, publishDate, marcControlField, accessType, date_added, marcRecord) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", PreparedStatement.RETURN_GENERATED_KEYS);
			updateEContentRecord = econtentConn.prepareStatement("UPDATE econtent_record SET ilsId = ?, cover = ?, source = ?, title = ?, subTitle = ?, author = ?, author2 = ?, description = ?, contents = ?, subject = ?, language = ?, publisher = ?, edition = ?, isbn = ?, issn = ?, upc = ?, lccn = ?, topic = ?, genre = ?, region = ?, era = ?, target_audience = ?, sourceUrl = ?, purchaseUrl = ?, publishDate = ?, marcControlField = ?, accessType = ?, date_updated = ?, marcRecord = ? WHERE id = ?");
			deleteEContentItem = econtentConn.prepareStatement("DELETE FROM econtent_item where id = ?");
			
			doesGutenbergItemExist = econtentConn.prepareStatement("SELECT id from econtent_item WHERE recordId = ? AND item_type = ? and notes = ?");
			addGutenbergItem = econtentConn.prepareStatement("INSERT INTO econtent_item (recordId, item_type, filename, folder, link, notes, date_added, addedBy, date_updated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			updateGutenbergItem = econtentConn.prepareStatement("UPDATE econtent_item SET filename = ?, folder = ?, link = ?, date_updated =? WHERE recordId = ? AND item_type = ? AND notes = ?");
			
			existingEContentRecordLinks = econtentConn.prepareStatement("SELECT id, link, libraryId from econtent_item WHERE recordId = ?");
			addSourceUrl = econtentConn.prepareStatement("INSERT INTO econtent_item (recordId, item_type, link, date_added, addedBy, date_updated, libraryId) VALUES (?, ?, ?, ?, ?, ?, ?)");
			updateSourceUrl = econtentConn.prepareStatement("UPDATE econtent_item SET link = ?, date_updated =? WHERE id = ?");
			
			doesOverDriveIdExist =  econtentConn.prepareStatement("SELECT id, overDriveId, link from econtent_item WHERE recordId = ? AND item_type = ? AND libraryId = ?");
			addOverDriveId = econtentConn.prepareStatement("INSERT INTO econtent_item (recordId, item_type, overDriveId, link, date_added, addedBy, date_updated, libraryId) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			updateOverDriveId = econtentConn.prepareStatement("UPDATE econtent_item SET overDriveId = ?, link = ?, date_updated =? WHERE id = ?");
			
		} catch (Exception ex) {
			// handle any errors
			logger.error("Error initializing econtent extraction ", ex);
			return false;
		}
		return true;
	}
	
	@Override
	public boolean processMarcRecord(MarcProcessor marcProcessor, MarcRecordDetails recordInfo, int recordStatus, Logger logger) {
		try {
			//Check the 856 tag to see if this is a source that we can handle. 
			results.incRecordsProcessed();
			if (!recordInfo.isEContent()){
				results.incSkipped();
				return false;
			}
			
			//Record is eContent, get additional details about how to process it.
			HashMap<String, DetectionSettings> detectionSettingsBySource = recordInfo.getEContentDetectionSettings();
			if (detectionSettingsBySource == null || detectionSettingsBySource.size() == 0){
				logger.error("Record " + recordInfo.getId() + " was tagged as eContent, but we did not get detection settings for it.");
				results.addNote("Record " + recordInfo.getId() + " was tagged as eContent, but we did not get detection settings for it.");
				results.incErrors();
				return false;
			}
			
			for (String source : detectionSettingsBySource.keySet()){
				logger.debug("Record " + recordInfo.getId() + " is eContent, source is " + source);
				DetectionSettings detectionSettings = detectionSettingsBySource.get(source);
				//Generally should only have one source, but in theory there could be multiple sources for a single record
				String accessType = detectionSettings.getAccessType();
				//Make sure that overdrive titles are updated if we need to check availability
				if (source.equalsIgnoreCase("overdrive") && checkOverDriveAvailability){
					//Overdrive record, force processing to make sure we get updated availability
					logger.debug("Record is overdrive, forcing reindex to check overdrive availability");
				}else if (recordStatus == MarcProcessor.RECORD_UNCHANGED){
					if (reindexUnchangedRecords){
						logger.debug("Record is unchanged, but reindex unchanged records is on");
					}else{
						logger.debug("Skipping because the record is not changed");
						results.incSkipped();
						return false;
					}
				}else{
					logger.debug("Record has changed or is new");
				}
				
				
				//Check to see if the record already exists
				String ilsId = recordInfo.getId();
				if (ilsId.length() == 0){
					//Get the ils id
					ilsId = recordInfo.getId();
				}
				boolean importRecordIntoDatabase = true;
				long eContentRecordId = -1;
				if (ilsId.length() == 0){
					logger.warn("ILS Id could not be found in the marc record, importing.  Running this file multiple times could result in duplicate records in the catalog.");
				}else{
					doesIlsIdExist.setString(1, ilsId);
					ResultSet ilsIdExists = doesIlsIdExist.executeQuery();
					if (ilsIdExists.next()){
						//The record already exists, check if it needs to be updated?
						importRecordIntoDatabase = false;
						eContentRecordId = ilsIdExists.getLong("id");
					}else{
						//Add to database
						importRecordIntoDatabase = true;
					}
				}
				
				boolean recordAdded = false;
				if (importRecordIntoDatabase){
					//Add to database
					//logger.info("Adding ils id " + ilsId + " to the database.");
					createEContentRecord.setString(1, recordInfo.getId());
					createEContentRecord.setString(2, "");
					createEContentRecord.setString(3, source);
					createEContentRecord.setString(4, recordInfo.getFirstFieldValueInSet("title_short"));
					createEContentRecord.setString(5, recordInfo.getFirstFieldValueInSet("title_sub"));
					createEContentRecord.setString(6, recordInfo.getFirstFieldValueInSet("author"));
					createEContentRecord.setString(7, Util.getCRSeparatedString(recordInfo.getMappedField("author2")));
					createEContentRecord.setString(8, recordInfo.getDescription());
					createEContentRecord.setString(9, Util.getCRSeparatedString(recordInfo.getMappedField("contents")));
					createEContentRecord.setString(10, Util.getCRSeparatedString(recordInfo.getMappedField("topic_facet")));
					createEContentRecord.setString(11, recordInfo.getFirstFieldValueInSet("language"));
					createEContentRecord.setString(12, recordInfo.getFirstFieldValueInSet("publisher"));
					createEContentRecord.setString(13, recordInfo.getFirstFieldValueInSet("edition"));
					createEContentRecord.setString(14, Util.getCRSeparatedString(recordInfo.getMappedField("isbn")));
					createEContentRecord.setString(15, Util.getCRSeparatedString(recordInfo.getMappedField("issn")));
					createEContentRecord.setString(16, recordInfo.getFirstFieldValueInSet("language"));
					createEContentRecord.setString(17, recordInfo.getFirstFieldValueInSet("lccn"));
					createEContentRecord.setString(18, Util.getCRSeparatedString(recordInfo.getMappedField("topic")));
					createEContentRecord.setString(19, Util.getCRSeparatedString(recordInfo.getMappedField("genre")));
					createEContentRecord.setString(20, Util.getCRSeparatedString(recordInfo.getMappedField("geographic")));
					createEContentRecord.setString(21, Util.getCRSeparatedString(recordInfo.getMappedField("era")));
					createEContentRecord.setString(22, Util.getCRSeparatedString(recordInfo.getMappedField("target_audience")));
					String sourceUrl = "";
					if (recordInfo.getSourceUrls().size() == 1){
						sourceUrl = recordInfo.getSourceUrls().get(0).getUrl();
					}
					createEContentRecord.setString(23, sourceUrl);
					createEContentRecord.setString(24, recordInfo.getPurchaseUrl());
					createEContentRecord.setString(25, recordInfo.getFirstFieldValueInSet("publishDate"));
					createEContentRecord.setString(26, recordInfo.getFirstFieldValueInSet("ctrlnum"));
					createEContentRecord.setString(27, accessType);
					createEContentRecord.setLong(28, new Date().getTime() / 1000);
					createEContentRecord.setString(29, recordInfo.toString());
					int rowsInserted = createEContentRecord.executeUpdate();
					if (rowsInserted != 1){
						logger.error("Could not insert row into the database");
						results.incErrors();
						results.addNote("Error inserting econtent record for id " + ilsId + " number of rows updated was not 1");
					}else{
						ResultSet generatedKeys = createEContentRecord.getGeneratedKeys();
						while (generatedKeys.next()){
							eContentRecordId = generatedKeys.getLong(1);
							recordAdded = true;
							results.incAdded();
						}
					}
				}else{
					//Update the record
					//logger.info("Updating ilsId " + ilsId + " recordId " + eContentRecordId);
					updateEContentRecord.setString(1, recordInfo.getId());
					updateEContentRecord.setString(2, "");
					updateEContentRecord.setString(3, source);
					updateEContentRecord.setString(4, recordInfo.getFirstFieldValueInSet("title_short"));
					updateEContentRecord.setString(5, recordInfo.getFirstFieldValueInSet("title_sub"));
					updateEContentRecord.setString(6, recordInfo.getFirstFieldValueInSet("author"));
					updateEContentRecord.setString(7, Util.getCRSeparatedString(recordInfo.getMappedField("author2")));
					updateEContentRecord.setString(8, recordInfo.getDescription());
					updateEContentRecord.setString(9, Util.getCRSeparatedString(recordInfo.getMappedField("contents")));
					updateEContentRecord.setString(10, Util.getCRSeparatedString(recordInfo.getMappedField("topic_facet")));
					updateEContentRecord.setString(11, recordInfo.getFirstFieldValueInSet("language"));
					updateEContentRecord.setString(12, recordInfo.getFirstFieldValueInSet("publisher"));
					updateEContentRecord.setString(13, recordInfo.getFirstFieldValueInSet("edition"));
					updateEContentRecord.setString(14, Util.getCRSeparatedString(recordInfo.getMappedField("isbn")));
					updateEContentRecord.setString(15, Util.getCRSeparatedString(recordInfo.getMappedField("issn")));
					updateEContentRecord.setString(16, recordInfo.getFirstFieldValueInSet("upc"));
					updateEContentRecord.setString(17, recordInfo.getFirstFieldValueInSet("lccn"));
					updateEContentRecord.setString(18, Util.getCRSeparatedString(recordInfo.getMappedField("topic")));
					updateEContentRecord.setString(19, Util.getCRSeparatedString(recordInfo.getMappedField("genre")));
					updateEContentRecord.setString(20, Util.getCRSeparatedString(recordInfo.getMappedField("geographic")));
					updateEContentRecord.setString(21, Util.getCRSeparatedString(recordInfo.getMappedField("era")));
					updateEContentRecord.setString(22, Util.getCRSeparatedString(recordInfo.getMappedField("target_audience")));
					String sourceUrl = "";
					if (recordInfo.getSourceUrls().size() == 1){
						sourceUrl = recordInfo.getSourceUrls().get(0).getUrl();
					}
					updateEContentRecord.setString(23, sourceUrl);
					updateEContentRecord.setString(24, recordInfo.getPurchaseUrl());
					updateEContentRecord.setString(25, recordInfo.getFirstFieldValueInSet("publishDate"));
					updateEContentRecord.setString(26, recordInfo.getFirstFieldValueInSet("ctrlnum"));
					updateEContentRecord.setString(27, accessType);
					updateEContentRecord.setLong(28, new Date().getTime() / 1000);
					updateEContentRecord.setString(29, recordInfo.toString());
					updateEContentRecord.setLong(30, eContentRecordId);
					int rowsInserted = updateEContentRecord.executeUpdate();
					if (rowsInserted != 1){
						logger.error("Could not insert row into the database");
						results.incErrors();
						results.addNote("Error updating econtent record for id " + ilsId + " number of rows updated was not 1");
					}else{
						recordAdded = true;
						results.incUpdated();
					}
				}
				
				logger.info("Finished initial insertion/update recordAdded = " + recordAdded);
				
				if (recordAdded){
					if (source.equalsIgnoreCase("gutenberg")){
						attachGutenbergItems(recordInfo, eContentRecordId, logger);
					}else if (detectionSettings.getSource().equalsIgnoreCase("overdrive")){
						setupOverDriveItems(recordInfo, eContentRecordId, detectionSettings, logger);
					}else if (detectionSettings.isAdd856FieldsAsExternalLinks()){
						//Automatically setup 856 links as external links
						setupExternalLinks(recordInfo, eContentRecordId, detectionSettings, logger);
					}
					logger.info("Record processed successfully.");
					reindexRecord(eContentRecordId, logger);
				}else{
					logger.info("Record NOT processed successfully.");
				}
			}
			
			/*updateRecordsProcessed.setLong(1, this.recordsProcessed + 1);
			updateRecordsProcessed.setLong(2, logEntryId);
			updateRecordsProcessed.executeUpdate();*/
			return true;
		} catch (Exception e) {
			logger.error("Error importing marc record ", e);
			results.incErrors();
			results.addNote("Error extracting eContent for record " + recordInfo.getId() + " " + e.toString());
			return false;
		}finally{
			if (results.getRecordsProcessed() % 100 == 0){
				results.saveResults();
			}
		}
	}

	private void setupExternalLinks(MarcRecordDetails recordInfo, long eContentRecordId, DetectionSettings detectionSettings, Logger logger) {
		//Get existing links from the record
		ArrayList<LinkInfo> allLinks = new ArrayList<LinkInfo>();
		try {
			existingEContentRecordLinks.setLong(1, eContentRecordId);
			ResultSet allExistingUrls = existingEContentRecordLinks.executeQuery();
			while (allExistingUrls.next()){
				LinkInfo curLinkInfo = new LinkInfo();
				curLinkInfo.setItemId(allExistingUrls.getLong("id"));
				curLinkInfo.setLink(allExistingUrls.getString("link"));
				curLinkInfo.setLibraryId(allExistingUrls.getLong("libraryId"));
				allLinks.add(curLinkInfo);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		logger.debug("Found " + allLinks.size() + " existing links");
		
		//Add the links that are currently available for the record
		ArrayList<LibrarySpecificLink> sourceUrls = recordInfo.getSourceUrls();
		logger.info("Found " + sourceUrls.size() + " urls for " + recordInfo.getId());
		for (LibrarySpecificLink curLink : sourceUrls){
			//Look for an existing link
			LinkInfo linkForSourceUrl = null;
			for (LinkInfo tmpLinkInfo : allLinks){
				if (tmpLinkInfo.getLibraryId() == curLink.getLibrarySystemId()){
					linkForSourceUrl = tmpLinkInfo;
				}
			}
			addExternalLink(linkForSourceUrl, curLink.getUrl(), curLink.getLibrarySystemId(), eContentRecordId, detectionSettings, logger);
			if (linkForSourceUrl != null){
				allLinks.remove(linkForSourceUrl);
			}
		}
		
		//Remove any links that no longer exist
		logger.info("There are " + allLinks.size() + " links that need to be deleted");
		for (LinkInfo tmpLinkInfo : allLinks){
			try {
				deleteEContentItem.setLong(1, tmpLinkInfo.getItemId());
				deleteEContentItem.executeUpdate();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}
	
	private void addExternalLink(LinkInfo existingLinkInfo, String sourceUrl, long libraryId, long eContentRecordId, DetectionSettings detectionSettings, Logger logger) {
		//Check to see if the link already exists
		try {
			if (existingLinkInfo != null){
				logger.debug("Updating link " + sourceUrl + " libraryId = " + libraryId);
				String existingUrlValue = existingLinkInfo.getLink();
				Long existingItemId = existingLinkInfo.getItemId();
				if (!existingUrlValue.equals(sourceUrl)){
					//Url does not match, add it to the record. 
					updateSourceUrl.setString(1, sourceUrl);
					updateSourceUrl.setLong(2, new Date().getTime());
					updateSourceUrl.setLong(3, existingItemId);
					updateSourceUrl.executeUpdate();
				}
			}else{
				logger.debug("Adding link " + sourceUrl + " libraryId = " + libraryId);
				//the url does not exist, insert it
				addSourceUrl.setLong(1, eContentRecordId);
				addSourceUrl.setString(2, detectionSettings.getItem_type());
				addSourceUrl.setString(3, sourceUrl);
				addSourceUrl.setLong(4, new Date().getTime());
				addSourceUrl.setLong(5, -1);
				addSourceUrl.setLong(6, new Date().getTime());
				addSourceUrl.setLong(7, libraryId);
				addSourceUrl.executeUpdate();
			}
		} catch (SQLException e) {
			logger.error("Error adding link to record " + eContentRecordId + " " + sourceUrl, e);
			results.addNote("Error adding link to record " + eContentRecordId + " " + sourceUrl + " " + e.toString());
			results.incErrors();
		}
		
	}
	
	private void setupOverDriveItems(MarcRecordDetails recordInfo, long eContentRecordId, DetectionSettings detectionSettings, Logger logger){
		ArrayList<LibrarySpecificLink> sourceUrls = recordInfo.getSourceUrls();
		logger.info("Found " + sourceUrls.size() + " urls for overdrive id " + recordInfo.getId());
		//Check the items within the record to see if there are any location specific links
		for(LibrarySpecificLink link : recordInfo.getSourceUrls()){
			addOverdriveItem(link.getUrl(), link.getLibrarySystemId(), eContentRecordId, detectionSettings, logger);
		}
	}
	
	private void addOverdriveItem(String sourceUrl, long libraryId, long eContentRecordId, DetectionSettings detectionSettings, Logger logger) {
		//Check to see if the link already exists
		Pattern Regex = Pattern.compile("[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}", Pattern.CANON_EQ);
		Matcher RegexMatcher = Regex.matcher(sourceUrl);
		String overDriveId = null;
		if (RegexMatcher.find()) {
			overDriveId = RegexMatcher.group();
		} 
		logger.info("Found overDrive url\r\n" + sourceUrl + "\r\nlibraryId: " + libraryId + "  overDriveId: " + overDriveId);

		try {
			doesOverDriveIdExist.setLong(1, eContentRecordId);
			doesOverDriveIdExist.setString(2, detectionSettings.getItem_type());
			doesOverDriveIdExist.setLong(3, libraryId);
			ResultSet existingOverDriveId = doesOverDriveIdExist.executeQuery();
			if (existingOverDriveId.next()){
				String existingOverDriveIdValue = existingOverDriveId.getString("overDriveId");
				Long existingItemId = existingOverDriveId.getLong("id");
				String existingLink = existingOverDriveId.getString("link");
				if (!overDriveId.equals(existingOverDriveIdValue) | !sourceUrl.equals(existingLink)){
					//Url does not match, add it to the record. 
					updateOverDriveId.setString(1, overDriveId);
					updateOverDriveId.setString(2, sourceUrl);
					updateOverDriveId.setLong(3, new Date().getTime());
					updateOverDriveId.setLong(4, existingItemId);
					updateOverDriveId.executeUpdate();
				}
			}else{
				//the url does not exist, insert it
				addOverDriveId.setLong(1, eContentRecordId);
				addOverDriveId.setString(2, detectionSettings.getItem_type());
				addOverDriveId.setString(3, overDriveId);
				addOverDriveId.setString(4, sourceUrl);
				addOverDriveId.setLong(5, new Date().getTime());
				addOverDriveId.setLong(6, -1);
				addOverDriveId.setLong(7, new Date().getTime());
				addOverDriveId.setLong(8, libraryId);
				addOverDriveId.executeUpdate();
			}
		} catch (SQLException e) {
			logger.error("Error adding overdrive id to record " + eContentRecordId + " " + overDriveId, e);
			results.addNote("Error adding overdriveid to record " + eContentRecordId + " " + overDriveId + " " + e.toString());
			results.incErrors();
		}
		
	}

	private void attachGutenbergItems(MarcRecordDetails recordInfo, long eContentRecordId, Logger logger) {
		//If no, load the source url
		for (LibrarySpecificLink curLink : recordInfo.getSourceUrls()){
			String sourceUrl = curLink.getUrl();
			logger.info("Loading gutenberg items " + sourceUrl);
			try {
				//Get the source URL from the export of all items. 
				for (GutenbergItemInfo curItem : gutenbergItemInfo){
					if (curItem.getSourceUrl().equalsIgnoreCase(sourceUrl)){
						//Check to see if the item is already attached to the record.  
						doesGutenbergItemExist.setLong(1, eContentRecordId);
						doesGutenbergItemExist.setString(2, curItem.getFormat());
						doesGutenbergItemExist.setString(3, curItem.getNotes());
						ResultSet itemExistRs = doesGutenbergItemExist.executeQuery();
						if (itemExistRs.next()){
							//Check to see if the item needs to be updated (different folder or filename)
							updateGutenbergItem.setString(1, curItem.getFilename());
							updateGutenbergItem.setString(2, curItem.getFolder());
							updateGutenbergItem.setString(3, curItem.getLink());
							updateGutenbergItem.setLong(4, new Date().getTime());
							updateGutenbergItem.setLong(5, eContentRecordId);
							updateGutenbergItem.setString(6, curItem.getFormat());
							updateGutenbergItem.setString(7, curItem.getNotes());
							updateGutenbergItem.executeUpdate();
						}else{
							//Item does not exist, need to add it to the record.
							addGutenbergItem.setLong(1, eContentRecordId);
							addGutenbergItem.setString(2, curItem.getFormat());
							addGutenbergItem.setString(3, curItem.getFilename());
							addGutenbergItem.setString(4, curItem.getFolder());
							addGutenbergItem.setString(5, curItem.getLink());
							addGutenbergItem.setString(6, curItem.getNotes());
							addGutenbergItem.setLong(7, new Date().getTime());
							addGutenbergItem.setInt(8, -1);
							addGutenbergItem.setLong(9, new Date().getTime());
							addGutenbergItem.executeUpdate();
						}
					}
				}
				//Attach items based on the source URL
			} catch (Exception e) {
				logger.info("Unable to add items for " + eContentRecordId, e);
			}
		}
	}

	private void reindexRecord(final long eContentRecordId, final Logger logger) {
		//reindex the new record
		Thread reindexThread = new Thread(new Runnable() {
			
			@Override
			public void run() {
				// TODO Auto-generated method stub
				try {
					URL url = new URL(vufindUrl + "/EcontentRecord/" + eContentRecordId + "/Reindex");
					Object reindexResultRaw = url.getContent();
					if (reindexResultRaw instanceof InputStream) {
						String updateIndexResponse = Util.convertStreamToString((InputStream) reindexResultRaw);
						logger.info("Indexing record " + eContentRecordId + " response: " + updateIndexResponse);
					}
					logger.info("Finished reindex " + numReindexingThreadsRunning);
					numReindexingThreadsRunning--;
					logger.info("Remove thread " + numReindexingThreadsRunning);
				} catch (Exception e) {
					numReindexingThreadsRunning--;
					logger.info("Unable to reindex record " + eContentRecordId, e);
				}
			}
		});
		while (numReindexingThreadsRunning > 50){
			logger.info("There are more than 50 reindex threads running, waiting for some to finish, " + numReindexingThreadsRunning + " remain open");
			try {
				Thread.yield();
				Thread.sleep(250);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				logger.error("The thread was interrupted");
				break;
			}
		}
		numReindexingThreadsRunning++;
		lastThreadStartTime = new Date().getTime();
		reindexThread.start();
	}

	protected boolean loadConfig(Ini configIni, Logger logger) {
		
		econtentDBConnectionInfo = Util.cleanIniValue(configIni.get("Database", "database_econtent_jdbc"));
		if (econtentDBConnectionInfo == null || econtentDBConnectionInfo.length() == 0) {
			logger.error("Database connection information for eContent database not found in General Settings.  Please specify connection information in a econtentDatabase key.");
			return false;
		}
		
		vufindUrl = configIni.get("Site", "url");
		if (vufindUrl == null || vufindUrl.length() == 0) {
			logger.error("Unable to get URL for VuFind in General settings.  Please add a vufindUrl key.");
			return false;
		}
		
		//Load link to overdrive if any
		overdriveUrl = configIni.get("OverDrive", "marcIndicator");
		if (overdriveUrl == null || overdriveUrl.length() == 0) {
			logger.warn("Unable to get OverDrive Url in Process settings.  Please add a overdriveUrl key.");
		}
		
		//Get a list of information about Gutenberg items
		String gutenbergItemFile = configIni.get("Reindex", "gutenbergItemFile");
		if (gutenbergItemFile == null || gutenbergItemFile.length() == 0){
			logger.warn("Unable to get Gutenberg Item File in Process settings.  Please add a gutenbergItemFile key.");
		}else{
			HashSet<String> validFormats = new HashSet<String>();
			validFormats.add("epub");
			validFormats.add("pdf");
			validFormats.add("jpg");
			validFormats.add("gif");
			validFormats.add("mp3");
			validFormats.add("plucker");
			validFormats.add("kindle");
			validFormats.add("externalLink");
			validFormats.add("externalMP3");
			validFormats.add("interactiveBook");
			validFormats.add("overdrive");
			
			//Load the items 
			gutenbergItemInfo = new ArrayList<GutenbergItemInfo>();
			try {
				CSVReader gutenbergReader = new CSVReader(new FileReader(gutenbergItemFile));
				//Read headers
				gutenbergReader.readNext();
				String[] curItemInfo = gutenbergReader.readNext();
				while (curItemInfo != null){
					GutenbergItemInfo itemInfo = new GutenbergItemInfo(curItemInfo[1], curItemInfo[2], curItemInfo[3], curItemInfo[4], curItemInfo[5]);
					
					gutenbergItemInfo.add(itemInfo);
					curItemInfo = gutenbergReader.readNext();
				}
			} catch (Exception e) {
				logger.error("Could not read Gutenberg Item file");
			}
			
		}
		
		return true;
		
	}

	@Override
	public void finish() {
		//Wait a maximum of 5 minutes for all threads to finish indexing.
		while (numReindexingThreadsRunning > 0 && ((new Date().getTime() - lastThreadStartTime) > 5 * 60 * 1000)){
			logger.info("Waiting for all reindex threads to finish, " + numReindexingThreadsRunning + " remain open");
			try {
				Thread.yield();
				Thread.sleep(500);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				logger.error("The thread was interrupted");
				break;
			}
		}
	}
	
	@Override
	public ProcessorResults getResults() {
		return results;
	}
}
