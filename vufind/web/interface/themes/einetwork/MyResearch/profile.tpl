<div id="page-content" class="content">
{literal}
<script type="text/javascript">
	$(document).ready(function(){
		$('#phone').blur(function(){
			var phone=$(this).val(),
			    phoneReg=/^[2-9]\d{9}$/;
			if(!phoneReg.test(phone)){
				$('#phoneError').text('*please enter a valid phone number');
				phoneValid=false;
				return false;
			}else{
				$('#phoneError').html('&nbsp;');
				return true;
			}
		});

		$('#email').blur(function(){
			var email=$('input[name="email"]').val(),
		            emailReg=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
			if(!emailReg.test(email)||email==''){
				$('#emailError').text("*please enter a vaild email address");
				emailValid=false;
				return false;
			}else{
				$('#emailError').html('&nbsp;');
			}
		});
		
	});
	function checkWhenSubmit(){
		var phone=$('input[name="phone"]').val(),
		phoneReg=/^[2-9]\d{9}$/;
		var email=$('input[name="email"]').val(),
		emailReg=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if(!phoneReg.test(phone)||!emailReg.test(email)||email==''){
			return false;
		}else{
			return true;
		}
	}

</script>
{/literal}
	 
	<div id="left-bar">
		<div class="account_balance">
			<div>Account Balance</div>
			{*<div class="fine_details">
				<span>You have 2 overdue items accumulating fines</span>
				<br/>
				<input class="button" value="View Details"/>
			</div>*}
			<div class="pay_balance">
				<span>{$profile.fines}  due in library fines</span>
				<br/>
				<a href="http://catalog.einetwork.net/patroninfo"><input type="button" class="button" value="Pay Balance"/></a>
			</div>
		</div>
	</div>


	<div id="main-content">
		{if $profileUpdateErrors}
		<div class="error">{$profileUpdateErrors}</div>
		{/if}
		{if $user->cat_username}
		<div><h2>Account Settings</h2></div>
		<form id="profileForm" action="" method="post" {if $edit == true}onsubmit="return checkWhenSubmit();"{/if}>
		<h3 id="info">Information</h3>
		<input class="button" type="button" onclick="ajaxLightbox('/MyResearch/AJAX?method=getPinUpdateForm',false,false,'400px',false,'250px');return false;" value="Modify PIN Number"/>
			<div class="profile">
			<div id="name_notification" class="profile_row">
				<table>
				<tr style="font-weight: bolder">
					<td>{translate text='Name'}</td>
					<td>{translate text='Notification Preference'}</td>
				</tr>
				<tr>
					<td>
						{if $profile.fullname}
							{$profile.fullname|escape}
						{else}
							{$user->lastname|escape|upper}, {$user->firstname|escape|upper}
						{/if}
					
					</td>
					<td>
						{if $edit == true}
							<select name='notices'>
							<option value='z' >E-mail</option>
							<option value='p'>Phone</option>
							</select>
						{else}
						{if $profile.notices == 'p'}Phone{else}Email{/if}
						{/if}
					</td>
				</tr>
				</table>
			</div>
			<div id="card_expiration" class="profile_row">
				<table>
				<tr style="font-weight: bolder">
					<td>{translate text='Library Card Number'}</td>
					<td>{translate text='Card Expires'}</td>
				</tr>
				<tr>
					<td>{$card_number}</td>
					<td>{$profile.expires|escape}</td>
				</tr>
				</table>
			</div>
			<div id="address_library" class="profile_row">
				<table>
				<tr style="font-weight: bolder">
					<td>{translate text='Address'}</td>
					<td>{translate text='My Home Library'}</td>
				</tr>
				<tr>
					<td>{$profile.address1|escape} {$profile.state|escape} {$profile.zip|escape}</td>
					<td>{$profile.homeLocation|escape}</td>
				</tr>
				</table>
			</div>
			<div id="phone_email" class="profile_row">
				<table>
				<tr style="font-weight: bolder">
					<td>{translate text='Phone Number'}</td>
					<td>{translate text='Email'}</td>
				</tr>
				<tr>
					<td>
						{if $edit == true}
						<input id="phone" name='phone' class="text" value='{$profile.phone|escape}' size='20' maxlength='10' />
						<span id="phoneError" class="error">&nbsp;</span>
						{else}
							{if $profile.phone}
								{$profile.phone|escape}
							{else}
								{$user->phone|escape}
							{/if}
						{/if}
					</td>
					<td>
						{if $edit == true}
						<input id="email" name='email' class="text" value='{$profile.email|escape}' size='20' maxlength='30' />
						<span id="emailError" class="error">&nbsp;</span>
						{else}
							{if $profile.email}
								{$profile.email|escape}
							{else}
								{$user->email|escape}
							{/if}
						{/if}
					</td>
				</tr>
				</table>
			</div>


			<div id="preferred_alternative" class="profile_row">
				<table>
				<tr style="font-weight: bolder">
					<td>{translate text='Preferred Pick-up Location'}</td>
					<td>{translate text='Alternative Library'}</td>
				</tr>
				<tr>
					<td>
						{if $edit == true}
						{html_options name="myLocation1" options=$locationList selected=$profile.myLocation1Id}
						{else}{$profile.myLocation1|escape}
						{/if}
					</td>
					<td>
						{if $edit == true}
						{html_options name="myLocation2" options=$locationList selected=$profile.myLocation2Id}
						{else}{$profile.myLocation2|escape}
						{/if}
					</td>
				</tr>
				</table>
			</div>	
			
		</div>
		{if $canUpdate}
			{if $edit == true}
			<input  type='submit' value='Update Profile' name='update'  class='button'/>
			<input  type='button' value='Cancel' name='update' onclick='window.location.href="/MyResearch/Profile"' class='button'/>
			{else}
			<input type='submit' value='Edit Profile' name='edit' class='button'/>
			{/if}
		{/if}
		</form>
		{/if}
	</div>
	
	<div id="right-bar">
		{include file="MyResearch/menu.tpl"}
		{include file="Admin/menu.tpl"}
	</div>
	
</div>
