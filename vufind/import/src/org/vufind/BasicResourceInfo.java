package org.vufind;

public class BasicResourceInfo {
	private String ilsId;
	private Long resourceId;
	private Long marcChecksum;
	private Boolean deleted;
	public BasicResourceInfo(String ilsId, Long resourceId, Long marcChecksum, Boolean deleted){
		this.ilsId = ilsId;
		this.resourceId = resourceId;
		this.marcChecksum = marcChecksum;
		this.deleted = deleted;
	}
	public String getIlsId() {
		return ilsId;
	}
	public void setIlsId(String ilsId) {
		this.ilsId = ilsId;
	}
	public Long getResourceId() {
		return resourceId;
	}
	public void setResourceId(Long resourceId) {
		this.resourceId = resourceId;
	}
	public Long getMarcChecksum() {
		return marcChecksum;
	}
	public void setMarcChecksum(Long marcChecksum) {
		this.marcChecksum = marcChecksum;
	}
	public Boolean getDeleted() {
		return deleted;
	}
	public void setDeleted(Boolean deleted) {
		this.deleted = deleted;
	}
}
