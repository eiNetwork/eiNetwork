<script type="text/javascript" src="{$path}/js/validate/jquery.validate.js" ></script>
<script type="text/javascript" src="{$path}/services/MaterialsRequest/ajax.js" ></script>
<div id="page-content" class="content">
	<div id="main-content">
		<h2>{translate text='Materials Request'}</h2>
		<div id="materialsRequest">
			<div class="materialsRequestExplanation">
				If you cannot find a title in our catalog, you can request the title via this form.
				Please enter as much information as possible so we can find the exact title you are looking for. 
				For example, if you are looking for a specific season of a TV show, please include that information.
			</div>
			<form id="materialsRequestForm" action="{$path}/MaterialsRequest/Submit" method="post">
				{include file="MaterialsRequest/request-form-fields.tpl"}
				
				<div class="materialsRequestLoggedInFields" {if !$user}style="display:none"{/if}>
					<div id="copyright" >
						WARNING CONCERNING COPYRIGHT RESTRICTIONS The copyright law of the United States (Title 17, United States Code) governs the making of photocopies or other reproductions of copyrighted material. Under certain conditions specified in the law, libraries and archives are authorized to furnish a photocopy or other reproduction. One of these specified conditions is that the photocopy or reproduction is not to be used for any purpose other than private study, scholarship, or research. If a user makes a request for, or later uses, a photocopy or reproduction for purposes in excess of fair use, that user may be liable for copyright infringement. This institution reserves the right to refuse to accept a copying order if, in its judgment, fulfillment of the order would involve violation of copyright law.
						<div id="copyrightAgreement" class="formatSpecificField articleField">
						<input type="radio" name="acceptCopyright" class="required" id="acceptCopyrightYes" value="1"/><label for="acceptCopyrightYes">Accept</label>
						<input type="radio" name="acceptCopyright" id="acceptCopyrightNo" value="1"/><label for="acceptCopyrightNo">Decline</label>
						</div>
					</div>
					<div>
						<input type="submit" value="Submit Materials Request" />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	setFieldVisibility();
	$("#materialsRequestForm").validate();
</script>