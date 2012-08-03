{if $user}
<div class="right-header-left">
    <div id="welcome-label">Welcome,</div>
    <div id="account-label" {if !$user} style="display: none;"{/if}>
        <a href="{$path}/MyResearch/Profile">
        {if strlen($user->displayName) > 0}{$user->displayName}
        {else}{$user->lastname|capitalize}{$user->firstname|capitalize}
        {/if}
        </a>
    </div>
</div>
<div class="right-header-right">
    <div id="sign-out-label"{if !$user} style="display: none;"{/if}>
        <a href="{$path}/MyResearch/Logout">{translate text="Sign Out"}</a>
    </div>    
</div>

{elseif $showLoginButton == 1}

<div class="right-header-left">
    <div id="account-label">
        <span {if $user} style="display: none;"{/if}>
            <a href="{$path}/" class='loginLink'>
            {translate text="My Account"}
            </a>
        </span>
    </div>
</div>

{/if}


