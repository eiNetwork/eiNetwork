package org.vufind;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;

import org.apache.log4j.Logger;
import org.apache.log4j.PropertyConfigurator;
import org.econtent.ExtractEContentFromMarc;
import org.ini4j.Ini;
import org.ini4j.InvalidFileFormatException;
import org.ini4j.Profile.Section;
import org.strands.StrandsProcessor;


/**
 * Runs the nightly reindex process to update solr index based on the latest
 * export from the ILS.
 * 
 * Reindex process does the following steps: 
 * 1) Runs export process to extract
 * marc records from the ILS (if applicable) 
 * 
 * @author Mark Noble <mnoble@turningleaftech.com>
 * 
 */
public class ReindexProcess {

	private static Logger logger	= Logger.getLogger(ReindexProcess.class);

	//General configuration
	private static String serverName;
	private static String indexSettings;
	private static Ini configIni;
	private static String solrPort;
	
	//Reporting information
	private static long reindexLogId;
	private static long startTime;
	private static long endTime;
	
	//Variables to determine what sub processes to run.
	private static boolean reloadDefaultSchema = false;
	private static boolean updateSolr = true;
	private static boolean updateResources = true;
	private static boolean loadEContentFromMarc = false;
	private static boolean exportStrandsCatalog = false;
	private static boolean exportOPDSCatalog = true;
	private static boolean updateAlphaBrowse = true;
	private static String idsToProcess = null;
	
	//Database connections and prepared statements
	private static Connection vufindConn = null;
	private static Connection econtentConn = null;
	
	private static PreparedStatement updateCronLogLastUpdatedStmt;
	private static PreparedStatement addNoteToCronLogStmt;
	
	/**
	 * Starts the reindexing process
	 * 
	 * @param args
	 */
	public static void main(String[] args) {
		startTime = new Date().getTime();
		// Get the configuration filename
		if (args.length == 0) {
			System.out.println("Please enter the server to index as the first parameter");
			System.exit(1);
		}
		serverName = args[0];
		System.setProperty("reindex.process.serverName", serverName);
		
		if (args.length > 1){
			indexSettings = args[1];
		}
		
		initializeReindex();
		
		// Runs the export process to extract marc records from the ILS (if applicable)
		runExportScript();
		
		//Reload schemas
		if (reloadDefaultSchema){
			reloadDefaultSchemas();
		}
		
		//Process all reords (marc records, econtent that has been added to the database, and resources)
		ArrayList<IRecordProcessor> recordProcessors;
		recordProcessors = loadRecordProcesors();
		try {
			if (recordProcessors.size() > 0){
				//Do processing of marc records with record processors loaded above. 
				// includes indexing records
				// extracting eContent from records
				// Updating resource information
				// Saving records to strands - may need to move to resources if we are doing partial exports
				processMarcRecords(recordProcessors);
				
				//Process eContent records that have been saved to the database. 
				processEContentRecords(recordProcessors);
				
				//Do processing of resources as needed (for extraction of resources).
				processResources(recordProcessors);
				
				for (IRecordProcessor processor : recordProcessors){
					processor.finish();
				}
			}
		} catch (Error e) {
			logger.error("Error processing reindex ", e);
			addNoteToCronLog("Error processing reindex " + e.toString());
		}
		
		// Send completion information
		endTime = new Date().getTime();
		sendCompletionMessage(recordProcessors);

		addNoteToCronLog("Finished Reindex for " + serverName);
		logger.info("Finished Reindex for " + serverName);
	}
	
	private static void reloadDefaultSchemas() {
		logger.info("Reloading schemas from default");
		try {
			//Copy default schemas from biblio to biblio2 and econtent
			logger.debug("Copying " + "../../sites/default/solr/biblio/conf/schema.xml" + " to " + "../../sites/default/solr/biblio2/conf/schema.xml");
			if (!Util.copyFile(new File("../../sites/default/solr/biblio/conf/schema.xml"), new File("../../sites/default/solr/biblio2/conf/schema.xml"))){
				logger.info("Unable to copy schema to biblio2");
				addNoteToCronLog("Unable to copy schema to biblio2");
			}
			logger.debug("Copying " + "../../sites/default/solr/biblio/conf/schema.xml" + " to " + "../../sites/default/solr/econtent/conf/schema.xml");
			if (!Util.copyFile(new File("../../sites/default/solr/biblio/conf/schema.xml"), new File("../../sites/default/solr/econtent/conf/schema.xml"))){
				logger.info("Unable to copy schema to econtent");
				addNoteToCronLog("Unable to copy schema to econtent");
			}
			logger.debug("Copying " + "../../sites/default/solr/biblio/conf/schema.xml" + " to " + "../../sites/default/solr/econtent2/conf/schema.xml");
			if (!Util.copyFile(new File("../../sites/default/solr/biblio/conf/schema.xml"), new File("../../sites/default/solr/econtent2/conf/schema.xml"))){
				logger.info("Unable to copy schema to econtent");
				addNoteToCronLog("Unable to copy schema to econtent");
			}
		} catch (IOException e) {
			logger.error("error reloading copying default scehmas", e);
			addNoteToCronLog("error reloading copying default scehmas " + e.toString());
		}
		//biblio
		reloadSchema("biblio");
		//biblio2
		reloadSchema("biblio2");
		//econtent
		reloadSchema("econtent");
		//econtent2
		reloadSchema("econtent2");
		//genealogy
		reloadSchema("genealogy");
	}

	private static void reloadSchema(String schemaName) {
		boolean reloadIndex = true;
		addNoteToCronLog("Reloading Schema " + schemaName);
		try {
			logger.debug("Copying " + "../../sites/default/solr/" + schemaName + "/conf/schema.xml" + " to " + "../../sites/" + serverName + "/solr/" + schemaName + "/conf/schema.xml");
			if (!Util.copyFile(new File("../../sites/default/solr/" + schemaName + "/conf/schema.xml"), new File("../../sites/" + serverName + "/solr/" + schemaName + "/conf/schema.xml"))){
				logger.info("Unable to copy schema for " + schemaName);
				addNoteToCronLog("Unable to copy schema for " + schemaName);
				reloadIndex = false;
			}
			logger.debug("Copying " + "../../sites/default/solr/" + schemaName + "/conf/mapping-FoldToASCII.txt" + " to " + "../../sites/" + serverName + "/solr/" + schemaName + "/conf/mapping-FoldToASCII.txt");
			if (!Util.copyFile(new File("../../sites/default/solr/" + schemaName + "/conf/mapping-FoldToASCII.txt"), new File("../../sites/" + serverName + "/solr/" + schemaName + "/conf/mapping-FoldToASCII.txt"))){
				logger.info("Unable to copy mapping-FoldToASCII.txt for " + schemaName);
				addNoteToCronLog("Unable to copy mapping-FoldToASCII.txt for " + schemaName);
			}
			logger.debug("Copying " + "../../sites/default/solr/" + schemaName + "/conf/mapping-ISOLatin1Accent.txt" + " to " + "../../sites/" + serverName + "/solr/" + schemaName + "/conf/mapping-ISOLatin1Accent.txt");
			if (!Util.copyFile(new File("../../sites/default/solr/" + schemaName + "/conf/mapping-ISOLatin1Accent.txt"), new File("../../sites/" + serverName + "/solr/" + schemaName + "/conf/mapping-ISOLatin1Accent.txt"))){
				logger.info("Unable to copy mapping-ISOLatin1Accent.txt for " + schemaName);
				addNoteToCronLog("Unable to copy mapping-ISOLatin1Accent.txt for " + schemaName);
			}
		} catch (IOException e) {
			// TODO Auto-generated catch block
			logger.error("error reloading default schema for " + schemaName, e);
			addNoteToCronLog("error reloading default schema for " + schemaName + " " + e.toString());
			reloadIndex = false;
		}
		if (reloadIndex){
			URLPostResponse response = Util.getURL("http://localhost:" + solrPort + "/solr/admin/cores?action=RELOAD&core=" + schemaName, logger);
			if (!response.isSuccess()){
				logger.error("Error reloading default schema for " + schemaName + " " + response.getMessage());
				addNoteToCronLog("Error reloading default schema for " + schemaName + " " + response.getMessage());
			}
		}
	}

	private static ArrayList<IRecordProcessor> loadRecordProcesors(){
		ArrayList<IRecordProcessor> supplementalProcessors = new ArrayList<IRecordProcessor>();
		if (updateSolr){
			MarcIndexer marcIndexer = new MarcIndexer();
			addNoteToCronLog("Initializing MarcIndexer");
			if (marcIndexer.init(configIni, serverName, reindexLogId, vufindConn, econtentConn, logger)){
				supplementalProcessors.add(marcIndexer);
			}else{
				logger.error("Could not initialize marcIndexer");
				System.exit(1);
			}
		}
		if (updateResources){
			addNoteToCronLog("Initializing UpdateResourceInformation");
			UpdateResourceInformation resourceUpdater = new UpdateResourceInformation();
			if (resourceUpdater.init(configIni, serverName, reindexLogId, vufindConn, econtentConn, logger)){
				supplementalProcessors.add(resourceUpdater);
			}else{
				logger.error("Could not initialize resourceUpdater");
				System.exit(1);
			}
		}
		if (loadEContentFromMarc){
			addNoteToCronLog("Initializing ExtractEContentFromMarc");
			ExtractEContentFromMarc econtentExtractor = new ExtractEContentFromMarc();
			if (econtentExtractor.init(configIni, serverName, reindexLogId, vufindConn, econtentConn, logger)){
				supplementalProcessors.add(econtentExtractor);
			}else{
				logger.error("Could not initialize econtentExtractor");
				System.exit(1);
			}
		}
		if (exportStrandsCatalog){
			addNoteToCronLog("Initializing StrandsProcessor");
			StrandsProcessor strandsProcessor = new StrandsProcessor();
			if (strandsProcessor.init(configIni, serverName, reindexLogId, vufindConn, econtentConn, logger)){
				supplementalProcessors.add(strandsProcessor);
			}else{
				logger.error("Could not initialize strandsProcessor");
				System.exit(1);
			}
		}
		if (updateAlphaBrowse){
			addNoteToCronLog("Initializing AlphaBrowseProcessor");
			AlphaBrowseProcessor alphaBrowseProcessor = new AlphaBrowseProcessor();
			if (alphaBrowseProcessor.init(configIni, serverName, reindexLogId, vufindConn, econtentConn, logger)){
				supplementalProcessors.add(alphaBrowseProcessor);
			}else{
				logger.error("Could not initialize strandsProcessor");
				System.exit(1);
			}
		}
		if (exportOPDSCatalog){
			// 14) Generate OPDS catalog
		}
		
		return supplementalProcessors;
	}

	private static void processResources(ArrayList<IRecordProcessor> supplementalProcessors) {
		ArrayList<IResourceProcessor> resourceProcessors = new ArrayList<IResourceProcessor>();
		for (IRecordProcessor processor: supplementalProcessors){
			if (processor instanceof IResourceProcessor){
				resourceProcessors.add((IResourceProcessor)processor);
			}
		}
		if (resourceProcessors.size() == 0){
			return;
		}
		
		logger.info("Processing resources");
		addNoteToCronLog("Processing resources");
		try {
			int resourcesProcessed = 0;
			long batchCount = 0;
			PreparedStatement resourceCountStmt = vufindConn.prepareStatement("SELECT count(id) FROM resource", ResultSet.TYPE_FORWARD_ONLY, ResultSet.CONCUR_READ_ONLY);
			ResultSet resourceCountRs = resourceCountStmt.executeQuery();
			if (resourceCountRs.next()){
				long numResources = resourceCountRs.getLong(1);
				logger.info("There are " + numResources + " resources currently loaded");
				long firstResourceToProcess = 0;
				long batchSize = 25000;
				PreparedStatement allResourcesStmt = vufindConn.prepareStatement("SELECT * FROM resource LIMIT ?, ?", ResultSet.TYPE_FORWARD_ONLY, ResultSet.CONCUR_READ_ONLY);
				while (firstResourceToProcess <= numResources){
					logger.debug("processing batch " + ++batchCount + " from " + firstResourceToProcess + " to " + (firstResourceToProcess + batchSize));
					allResourcesStmt.setLong(1, firstResourceToProcess);
					allResourcesStmt.setLong(2, batchSize);
					ResultSet allResources = allResourcesStmt.executeQuery();
					while (allResources.next()){
						for (IResourceProcessor resourceProcessor : resourceProcessors){
							resourceProcessor.processResource(allResources);
						}
					}
					allResources.close();
					firstResourceToProcess += batchSize;
					resourcesProcessed++;
					if (resourcesProcessed % 1000 == 0){
						updateLastUpdateTime();
					}
				}
			}
		} catch (Exception e) {
			logger.error("Exception processing resources", e);
			System.out.println("Exception processing resources " + e.toString());
			addNoteToCronLog("Exception processing resources " + e.toString());
		} catch (Error e) {
			logger.error("Error processing resources", e);
			System.out.println("Error processing resources " + e.toString());
			addNoteToCronLog("Error processing resources " + e.toString());
		}
	}

	private static void processEContentRecords(ArrayList<IRecordProcessor> supplementalProcessors) {
		logger.info("Processing econtent records");
		addNoteToCronLog("Processing econtent records");
		ArrayList<IEContentProcessor> econtentProcessors = new ArrayList<IEContentProcessor>();
		for (IRecordProcessor processor: supplementalProcessors){
			if (processor instanceof IEContentProcessor){
				econtentProcessors.add((IEContentProcessor)processor);
			}
		}
		if (econtentProcessors.size() == 0){
			return;
		}
		//Check to see if the record already exists
		try {
			int econtentRecordsProcessed = 0;
			String idFilter = "";
			if (idsToProcess != null && idsToProcess.length() > 0){
				idFilter = " AND id REGEXP '" + idsToProcess + "'";
			}
			PreparedStatement econtentRecordStatement = econtentConn.prepareStatement("SELECT * FROM econtent_record WHERE status = 'active'" + idFilter, ResultSet.TYPE_FORWARD_ONLY, ResultSet.CONCUR_READ_ONLY);
			ResultSet allEContent = econtentRecordStatement.executeQuery();
			long indexTime = new Date().getTime() / 1000;
			while (allEContent.next()){
				for (IEContentProcessor econtentProcessor : econtentProcessors){
					//Determine if the record is new, updated, deleted, or unchanged
					long dateAdded = allEContent.getLong("date_added");
					long dateUpdated = allEContent.getLong("date_updated");
					String status = allEContent.getString("status");
					long recordStatus = MarcProcessor.RECORD_UNCHANGED;
					if (status.equals("deleted") || status.equals("archived")){
						recordStatus = MarcProcessor.RECORD_DELETED;
					}else{
						if ((indexTime - dateAdded) < 24 * 60 * 60){
							recordStatus = MarcProcessor.RECORD_NEW;
						}else if ((indexTime - dateUpdated) < 24 * 60 * 60){
							recordStatus = MarcProcessor.RECORD_CHANGED_PRIMARY;
						}else if ((indexTime - dateUpdated) < 48 * 60 * 60){
							recordStatus = MarcProcessor.RECORD_CHANGED_SECONDARY;
						}
					}
					econtentProcessor.processEContentRecord(allEContent, recordStatus);
				}
				econtentRecordsProcessed++;
				if (econtentRecordsProcessed % 1000 == 0){
					updateLastUpdateTime();
				}
			}
		} catch (SQLException ex) {
			// handle any errors
			logger.error("Unable to load econtent records from database", ex);
			addNoteToCronLog("Unable to load econtent records from database " + ex.toString());
		}
	}

	private static void processMarcRecords(ArrayList<IRecordProcessor> supplementalProcessors) {
		ArrayList<IMarcRecordProcessor> marcProcessors = new ArrayList<IMarcRecordProcessor>();
		for (IRecordProcessor processor: supplementalProcessors){
			if (processor instanceof IMarcRecordProcessor){
				marcProcessors.add((IMarcRecordProcessor)processor);
			}
		}
		if (marcProcessors.size() == 0){
			return;
		}
		
		MarcProcessor marcProcessor = new MarcProcessor();
		marcProcessor.init(serverName, configIni, vufindConn, econtentConn, logger);
		
		if (supplementalProcessors.size() > 0){
			logger.info("Processing exported marc records");
			addNoteToCronLog("Processing exported marc records");
			marcProcessor.processMarcFiles(marcProcessors, logger);
		}
	}

	private static void runExportScript() {
		String extractScript = configIni.get("Reindex", "extractScript");
		if (extractScript.length() > 0) {
			addNoteToCronLog("Running extract script " + extractScript);
			
			logger.info("Running export script");
			try {
				String reindexResult = SystemUtil.executeCommand(extractScript, logger);
				logger.info("Result of extractScript (" + extractScript + ") was " + reindexResult);
				addNoteToCronLog("Result of extractScript (" + extractScript + ") was " + reindexResult);
			} catch (IOException e) {
				logger.error("Error running extract script, stopping reindex process", e);
				addNoteToCronLog("Error running extract script, stopping reindex process " + e.toString());
				System.exit(1);
			}
		}
	}

	private static StringBuffer cronNotes = new StringBuffer();
	private static SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
	public static void addNoteToCronLog(String note) {
		try {
			Date date = new Date();
			cronNotes.append("<br>").append(dateFormat.format(date)).append(note);
			addNoteToCronLogStmt.setString(1, Util.trimTo(65535, cronNotes.toString()));
			addNoteToCronLogStmt.setLong(2, new Date().getTime() / 1000);
			addNoteToCronLogStmt.setLong(3, reindexLogId);
			addNoteToCronLogStmt.executeUpdate();
		} catch (SQLException e) {
			logger.error("Error adding note to Reindex Log", e);
		}
	}
	
	public static void updateLastUpdateTime(){
		try {
			updateCronLogLastUpdatedStmt.setLong(1, new Date().getTime() / 1000);
			updateCronLogLastUpdatedStmt.setLong(2, reindexLogId);
			updateCronLogLastUpdatedStmt.executeUpdate();
			//Sleep for a little bit to make sure we don't block connectivity for other programs 
			Thread.sleep(5);
			//Thread.yield();
		} catch (SQLException e) {
			logger.error("Error setting last updated time in Cron Log", e);
		} catch (InterruptedException e) {
			logger.error("Sleep interrupted", e);
		}
	}

	private static void initializeReindex() {
		// Delete the existing reindex.log file
		File solrmarcLog = new File("../../sites/" + serverName + "/logs/reindex.log");
		if (solrmarcLog.exists()){
			solrmarcLog.delete();
		}
		for (int i = 1; i <= 10; i++){
			solrmarcLog = new File("../../sites/" + serverName + "/logs/reindex.log." + i);
			if (solrmarcLog.exists()){
				solrmarcLog.delete();
			}
		}
		solrmarcLog = new File("solrmarc.log");
		if (solrmarcLog.exists()){
			solrmarcLog.delete();
		}
		for (int i = 1; i <= 4; i++){
			solrmarcLog = new File("solrmarc.log." + i);
			if (solrmarcLog.exists()){
				solrmarcLog.delete();
			}
		}
		
		// Initialize the logger
		File log4jFile = new File("../../sites/" + serverName + "/conf/log4j.reindex.properties");
		if (log4jFile.exists()) {
			PropertyConfigurator.configure(log4jFile.getAbsolutePath());
		} else {
			System.out.println("Could not find log4j configuration " + log4jFile.getAbsolutePath());
			System.exit(1);
		}
		
		logger.info("Starting Reindex for " + serverName);

		// Parse the configuration file
		configIni = loadConfigFile("config.ini");
		
		if (indexSettings != null){
			logger.info("Loading index settings from override file " + indexSettings);
			String indexSettingsName = "../../sites/" + serverName + "/conf/" + indexSettings + ".ini";
			File indexSettingsFile = new File(indexSettingsName);
			if (!indexSettingsFile.exists()) {
				indexSettingsName = "../../sites/default/conf/" + indexSettings + ".ini";
				indexSettingsFile = new File(indexSettingsName);
				if (!indexSettingsFile.exists()) {
					logger.error("Could not find indexSettings file " + indexSettings);
					System.exit(1);
				}
			}
			try {
				Ini indexSettingsIni = new Ini();
				indexSettingsIni.load(new FileReader(indexSettingsFile));
				for (Section curSection : indexSettingsIni.values()){
					for (String curKey : curSection.keySet()){
						logger.debug("Overriding " + curSection.getName() + " " + curKey + " " + curSection.get(curKey));
						//System.out.println("Overriding " + curSection.getName() + " " + curKey + " " + curSection.get(curKey));
						configIni.put(curSection.getName(), curKey, curSection.get(curKey));
					}
				}
			} catch (InvalidFileFormatException e) {
				logger.error("IndexSettings file is not valid.  Please check the syntax of the file.", e);
			} catch (IOException e) {
				logger.error("IndexSettings file could not be read.", e);
			}
		}
		
		solrPort = configIni.get("Reindex", "solrPort");
		if (solrPort == null || solrPort.length() == 0) {
			logger.error("You must provide the port where the solr index is loaded in the import configuration file");
			System.exit(1);
		}
		
		String reloadDefaultSchemaStr = configIni.get("Reindex", "reloadDefaultSchema");
		if (reloadDefaultSchemaStr != null){
			reloadDefaultSchema = Boolean.parseBoolean(reloadDefaultSchemaStr);
		}
		String updateSolrStr = configIni.get("Reindex", "updateSolr");
		if (updateSolrStr != null){
			updateSolr = Boolean.parseBoolean(updateSolrStr);
		}
		String updateResourcesStr = configIni.get("Reindex", "updateResources");
		if (updateResourcesStr != null){
			updateResources = Boolean.parseBoolean(updateResourcesStr);
		}
		String exportStrandsCatalogStr = configIni.get("Reindex", "exportStrandsCatalog");
		if (exportStrandsCatalogStr != null){
			exportStrandsCatalog = Boolean.parseBoolean(exportStrandsCatalogStr);
		}
		String exportOPDSCatalogStr = configIni.get("Reindex", "exportOPDSCatalog");
		if (exportOPDSCatalogStr != null){
			exportOPDSCatalog = Boolean.parseBoolean(exportOPDSCatalogStr);
		}
		String loadEContentFromMarcStr = configIni.get("Reindex", "loadEContentFromMarc");
		if (loadEContentFromMarcStr != null){
			loadEContentFromMarc = Boolean.parseBoolean(loadEContentFromMarcStr);
		}
		String updateAlphaBrowseStr  = configIni.get("Reindex", "updateAlphaBrowse");
		if (updateAlphaBrowseStr != null){
			updateAlphaBrowse = Boolean.parseBoolean(updateAlphaBrowseStr);
		}
		
		logger.info("Setting up database connections");
		//Setup connections to vufind and econtent databases
		String databaseConnectionInfo = Util.cleanIniValue(configIni.get("Database", "database_vufind_jdbc"));
		if (databaseConnectionInfo == null || databaseConnectionInfo.length() == 0) {
			logger.error("VuFind Database connection information not found in Database Section.  Please specify connection information in database_vufind_jdbc.");
			System.exit(1);
		}
		try {
			vufindConn = DriverManager.getConnection(databaseConnectionInfo);
		} catch (SQLException e) {
			logger.error("Could not connect to vufind database", e);
			System.exit(1);
		}
		
		String econtentDBConnectionInfo = Util.cleanIniValue(configIni.get("Database", "database_econtent_jdbc"));
		if (econtentDBConnectionInfo == null || econtentDBConnectionInfo.length() == 0) {
			logger.error("Database connection information for eContent database not found in Database Section.  Please specify connection information as database_econtent_jdbc key.");
			System.exit(1);
		}
		try {
			econtentConn = DriverManager.getConnection(econtentDBConnectionInfo);
		} catch (SQLException e) {
			logger.error("Could not connect to econtent database", e);
			System.exit(1);
		}
		
		//Start a reindex log entry 
		try {
			logger.info("Creating log entry for index");
			PreparedStatement createLogEntryStatement = vufindConn.prepareStatement("INSERT INTO reindex_log (startTime, lastUpdate, notes) VALUES (?, ?, ?)", PreparedStatement.RETURN_GENERATED_KEYS);
			createLogEntryStatement.setLong(1, new Date().getTime() / 1000);
			createLogEntryStatement.setLong(2, new Date().getTime() / 1000);
			createLogEntryStatement.setString(3, "Initialization complete");
			createLogEntryStatement.executeUpdate();
			ResultSet generatedKeys = createLogEntryStatement.getGeneratedKeys();
			if (generatedKeys.next()){
				reindexLogId = generatedKeys.getLong(1);
			}
			
			updateCronLogLastUpdatedStmt = vufindConn.prepareStatement("UPDATE reindex_log SET lastUpdate = ? WHERE id = ?");
			addNoteToCronLogStmt = vufindConn.prepareStatement("UPDATE reindex_log SET notes = ?, lastUpdate = ? WHERE id = ?");
		} catch (SQLException e) {
			logger.error("Unable to create log entry for reindex process", e);
			System.exit(0);
		}
		
		idsToProcess = Util.cleanIniValue(configIni.get("Reindex", "idsToProcess"));
		if (idsToProcess == null || idsToProcess.length() == 0){
			idsToProcess = null;
			logger.debug("Did not load a set of idsToProcess");
		}else{
			logger.debug("idsToProcess = " + idsToProcess);
		}
		
	}
	
	private static void sendCompletionMessage(ArrayList<IRecordProcessor> recordProcessors){
		logger.info("Reindex Results");
		logger.info("Processor, Records Processed, eContent Processed, Resources Processed, Errors, Added, Updated, Deleted, Skipped");
		for (IRecordProcessor curProcessor : recordProcessors){
			ProcessorResults results = curProcessor.getResults();
			logger.info(results.toCsv());
		}
		long elapsedTime = endTime - startTime;
		float elapsedMinutes = (float)elapsedTime / (float)(60000); 
		logger.info("Time elpased: " + elapsedMinutes + " minutes");
		
		try {
			PreparedStatement finishedStatement = vufindConn.prepareStatement("UPDATE reindex_log SET endTime = ? WHERE id = ?");
			finishedStatement.setLong(1, new Date().getTime() / 1000);
			finishedStatement.setLong(2, reindexLogId);
			finishedStatement.executeUpdate();
		} catch (SQLException e) {
			logger.error("Unable to update reindex log with completion time.", e);
		}
	}
	
	private static Ini loadConfigFile(String filename){
		//First load the default config file 
		String configName = "../../sites/default/conf/" + filename;
		logger.info("Loading configuration from " + configName);
		File configFile = new File(configName);
		if (!configFile.exists()) {
			logger.error("Could not find configuration file " + configName);
			System.exit(1);
		}

		// Parse the configuration file
		Ini ini = new Ini();
		try {
			ini.load(new FileReader(configFile));
		} catch (InvalidFileFormatException e) {
			logger.error("Configuration file is not valid.  Please check the syntax of the file.", e);
		} catch (FileNotFoundException e) {
			logger.error("Configuration file could not be found.  You must supply a configuration file in conf called config.ini.", e);
		} catch (IOException e) {
			logger.error("Configuration file could not be read.", e);
		}
		
		//Now override with the site specific configuration
		String siteSpecificFilename = "../../sites/" + serverName + "/conf/" + filename;
		logger.info("Loading site specific config from " + siteSpecificFilename);
		File siteSpecificFile = new File(siteSpecificFilename);
		if (!siteSpecificFile.exists()) {
			logger.error("Could not find server specific config file");
			System.exit(1);
		}
		try {
			Ini siteSpecificIni = new Ini();
			siteSpecificIni.load(new FileReader(siteSpecificFile));
			for (Section curSection : siteSpecificIni.values()){
				for (String curKey : curSection.keySet()){
					//logger.debug("Overriding " + curSection.getName() + " " + curKey + " " + curSection.get(curKey));
					//System.out.println("Overriding " + curSection.getName() + " " + curKey + " " + curSection.get(curKey));
					ini.put(curSection.getName(), curKey, curSection.get(curKey));
				}
			}
		} catch (InvalidFileFormatException e) {
			logger.error("Site Specific config file is not valid.  Please check the syntax of the file.", e);
		} catch (IOException e) {
			logger.error("Site Specific config file could not be read.", e);
		}
		return ini;
	}
}