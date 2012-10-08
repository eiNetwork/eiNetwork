{strip}
<script type="text/javascript" src="{$path}/services/Record/ajax.js"></script>
<div id="page-content" class="content">
	<div id="left-bar">
	{if $sideRecommendations}
		{foreach from=$sideRecommendations item="recommendations"}
		{include file=$recommendations}
		{/foreach}
	{/if}
	</div>
	<div id="main-content">
		<div class="resulthead" style="margin-bottom: 25px;">
			<h3>{translate text='Place a Hold'}</h3>
		</div>
		<form id='placeHoldForm' name='placeHoldForm' action="{$path}/Record/{$id|escape:"url"}/Hold" method="post">
			<div style="margin-left: 20px">
				<div id="loginFormWrapper">
					{if (!isset($profile)) }
						<div id='haveCardLabel' class='loginFormRow'>I have an Allegheny County Library Card</div>
						<div id ='loginUsernameRow' class='loginFormRow'>
							<div class='loginLabel'>{translate text='Username'}: </div>
							<div class='loginField'><input type="text" name="username" id="username" value="{$username|escape}" size="15"/></div>
						</div>
						<div id ='loginPasswordRow' class='loginFormRow'>
							<div class='loginLabel'>{translate text='Password'}: </div>
							<div class='loginField'><input type="password" name="password" id="password" size="15"/></div>
						</div>
						<div id='loginSubmitButtonRow' class='loginFormRow'>
							<input id="loginButton" type="button" onclick="GetPreferredBranches('{$id|escape}');" value="Login"/>
						</div>
					{/if}
					<div id='holdOptions' {if (!isset($profile)) }style='display:none'{/if}>
						<div class='loginFormRow'>
							<p>	
								<span class='loginLabel' style="margin-bottom: 12px; font-size: 15px;">{translate text="I want to pick this up at"}:</span>
								<span class='loginField'>
									<select name="campus" id="campus" style="margin-left: 20px;width: 260px">
										{if count($pickupLocations) > 0}
											{foreach from=$pickupLocations item=location}
												<option value="{$location->code}" {if $location->selected == "selected"}selected="selected"{/if}>{$location->displayName}</option>
											{/foreach}
										{else} 
											<option>placeholder</option>
										{/if}
									</select>
								</span>
								<span>
									<input type="submit" class="button" style="margin-left: 60px;" name="submit" id="requestTitleButton" value="{translate text='Request This Title'}" {if (!isset($profile))}disabled="disabled"{/if}/>
								</span>
							</p>
								
						</div>
						<div class='loginFormRow'>
							<input type="hidden" name="type" value="hold"/>
							<input type="checkbox" style="margin-right: 0px" name="autologout" /> Log me out after requesting the item. 
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	{include file="ei_tpl/right-bar.tpl"}
</div>
{/strip}