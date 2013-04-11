{literal}
<script>
function mod10_check(val){
	var nondigits = new RegExp(/[^0-9]+/g);
	var number = val.replace(nondigits,'');
	var pos, digit, i, sub_total, sum = 0;
	var strlen = number.length;
	if(strlen < 13){ return false; }
	for(i=0;i<strlen;i++){
		pos = strlen - i;
		digit = parseInt(number.substring(pos - 1, pos));
		if(i % 2 == 1){
			sub_total = digit * 2;
			if(sub_total > 9){
				sub_total = 1 + (sub_total - 10);
			}
		} else {
			sub_total = digit;
		}
		sum += sub_total;
	}
	if(sum > 0 && sum % 10 == 0){
		return true;
	}
	return false;
}
</script>
{/literal}
<div id="page-content" class="content">
	<div id="left-bar">

	</div>
	<div id="main-content">
		<div>
			<div style= "width:50%; float:left;">
				<div class="">
					Billing Information
				</div>
				<div>
					<input type="checkbox" name="info" /><label for="info">Use my library information</label>
				</div>
				<div>
					Name: <input type="text" />
				</div>
			</div>
			<div style="float:right; width:50%;>
				<div class="">
					Credit Card Information
				</div>
				<div>
					Card Number: <input type="text" />
				</div>
				<div>
					Expiration: <select id="exMonth" title="Select Month" style="width:60px">
									<option value="1">Jan</option> 
									<option value="2">Feb</option> 
									<option value="3">Mar</option>
									<option value="4">Apr</option> 
									<option value="5">May</option> 
									<option value="6">June</option> 
									<option value="7">July</option> 
									<option value="8">Aug</option> 
									<option value="9">Sept</option> 
									<option value="10">Oct</option> 
									<option value="11">Nov</option> 
									<option value="12">Dec</option>
								</select>
								  <select id="exYear" title="Select Year" style="width:60px">
								  </select>
				</div>
				<div>
					CVS CODE: <input type="text" />
				</div>
			</div>
		</div>

		<div id="right-bar">
			{include file="MyResearch/menu.tpl"}
			{include file="Admin/menu.tpl"}
		</div>
</div>