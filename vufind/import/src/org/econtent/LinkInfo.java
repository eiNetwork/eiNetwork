package org.econtent;

public class LinkInfo {
	private long itemId;
	private String link;
	private long libraryId;
	private String itemType;
	
	public long getItemId() {
		return itemId;
	}
	public String getLink() {
		return link;
	}
	public void setLink(String link) {
		this.link = link;
	}
	public void setItemId(long itemId) {
		this.itemId = itemId;
	}
	public long getLibraryId() {
		return libraryId;
	}
	public void setLibraryId(long libraryId) {
		this.libraryId = libraryId;
	}
	public String getItemType() {
		return itemType;
	}
	public void setItemType(String itemType) {
		this.itemType = itemType;
	}
	
}