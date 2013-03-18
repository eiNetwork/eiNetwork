
{if $profileUpdateErrors}
<div class="error">{$profileUpdateErrors}</div>
{/if}
{if $user->cat_username}
<p style="font-size: 15px; margin-bottom:5px;">Update Your Preferred Libraries</p>
<form id="profileForm" onsubmit="updatePreferredBranches();return false;">
<div class="profile" style="padding-bottom: 0px;padding-top: 0px;margin-top: 0px">
        <div id="name_notification" class="profile_row" style="display:none">
                <table>
                <tr style="font-weight: bolder">
                        <td>{translate text='Name'}</td>
                        <td>{translate text='Notification Preference'}</td>
                </tr>
                <tr>
                        <td>{$profile.fullname|escape}</td>
                        <td>
                                {if $edit == true}
                                        <select name='notices' id="preferredBranch_notices">
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
        <div id="card_expiration" class="profile_row" style="display:none">
                <table>
                <tr style="font-weight: bolder">
                        <td>{translate text='Library Card Number'}</td>
                        <td>{translate text='Card Expired'}</td>
                </tr>
                <tr>
                        <td>{$card_number}</td>
                        <td>{$profile.expires|escape}</td>
                </tr>
                </table>
        </div>
        <div id="address_library" class="profile_row" style="display:none">
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
        <div id="phone_email" class="profile_row" style="display:none">
                <table>
                <tr style="font-weight: bolder">
                        <td>{translate text='Phone Number'}</td>
                        <td>{translate text='Email'}</td>
                </tr>
                <tr>
                        <td>
                                {if $edit == true}
                                <input id="preferredBranch_phone" name='phone' class="text" value='{$profile.phone|escape}' size='20' maxlength='10' />
                                <span id="phoneError" class="error">&nbsp;</span>
                                {else}{$profile.phone|escape}
                                {/if}
                        </td>
                        <td>
                                {if $edit == true}
                                <input id="preferredBranch_email" name='email' class="text" value='{$profile.email|escape}' size='20' maxlength='30' />
                                <span id="emailError" class="error">&nbsp;</span>
                                {else}{$profile.email|escape}
                                {/if}
                        </td>
                </tr>
                </table>
        </div>


        <div id="preferred_alternative" class="profile_row" style="padding-top:0px; margin-bottom:0px;">

           
		
            {if $edit == true}
	    	<p style="font-size: 12px">Preferred Library</p>
            {html_options name="myLocation1" id="preferredBranch_myLocation1" options=$locationList selected=$profile.myLocation1Id}
            {else}{$profile.myLocation1|escape}
    
	    
	    
            <p>
            {/if}
            {if $edit == true}
	    <p style="font-size: 12px">Alternative Library</p>
            {html_options name="myLocation2" id="preferredBranch_myLocation2" options=$locationList selected=$profile.myLocation2Id}
            {else}{$profile.myLocation2|escape}
            {/if}
            </p>
        </div>
        		<div style="font-size: 14px; padding-bottom:15px;">
			{$profile.homeLocation} (Home)
		</div>
        {if $canUpdate}
                {if $edit == true}
                <input  type='submit' value='Update Profile' name='update'  class='button'/>
                {else}
                <input type='submit' value='Edit Profile' name='edit' class='button'/>
                {/if}
        {/if}
        
</div>

</form>
{literal}
        <script>
                    function updatePreferredBranches(){
                        document.body.style.cursor = 'wait';
                        var dataSend = "notices="+$("#preferredBranch_notices").val()+"&phone="+$("#preferredBranch_phone").val()+"&email="+$("#preferredBranch_email").val()+"&myLocation1="+$("#preferredBranch_myLocation1").val()+"&myLocation2="+$("#preferredBranch_myLocation2").val();
                        //alert(dataSend);
                        $.ajax({
                            type: 'post',
                            url: '/MyResearch/AJAX?method=updatePreferredBranches',
                            dataType: "text",
                            data: dataSend,
                            success: function(data) {
                                //alert(data);
                                document.body.style.cursor = 'default';
                                location.reload();
                                },
                            error: function() {
                                alert("error");
                            }
                            })
                    }
        </script>
{/literal}
{/if}

	
