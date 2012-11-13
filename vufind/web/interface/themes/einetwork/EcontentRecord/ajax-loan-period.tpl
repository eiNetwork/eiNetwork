<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="popupHeader">
	{translate text='Loan Period'}
	<span><img src="/interface/themes/einetwork/images/closeHUDButton.png" style="float:right" onclick="hideLightbox()"/></span>
</div>
<div id="popupboxContent" class="popupContent" style="margin-top:10px">
	<form method="post" action="" style="margin-left:8px"> 
		<div>
			<input type="hidden" name="overdriveId" value="{$overDriveId}"/>
			<input type="hidden" name="formatId" value="{$formatId}"/>
			<label for="loanPeriod" style="margin-top:10px;margin-bottom:8px">{translate text="How long would you like to checkout this title?"}</label>
			<select name="loanPeriod" id="loanPeriod">
				{foreach from=$loanPeriods item=loanPeriod}
					<option value="{$loanPeriod}">{$loanPeriod} days</option>
				{/foreach}
			</select> 
			<input class="button" style="background-color:rgb(244,213,56);width:77px;height:30px;padding-top:0px;padding-bottom:0px" type="button" name="submit" value="Check Out" onclick="return checkoutOverDriveItemStep2('{$overDriveId}', '{$formatId}')"/>
		</div>
	</form>
</div>