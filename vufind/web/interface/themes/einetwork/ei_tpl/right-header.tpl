{if $user}
<div class="right-header-left">
    <div id="sign-label">Sign as</div>
    <div id="myAccount" {if !$user} style="display: none;"{/if}>
        <a href="{$path}/MyResearch/Home">
        {if strlen($user->displayName) > 0}{$user->displayName}
        {else}{$user->firstname|capitalize} {$user->lastname|capitalize}
        {/if}
        </a>
    </div>
</div>
    
<div class="right-header-right">
    <div {if !$user} style="display: none;"{/if}>
        <a href="{$path}/MyResearch/Logout">{translate text="Sign Out"}</a>
    </div>    
</div>
{elseif $showLoginButton == 1}

<div class="right-header-left">
    <span {if $user} style="display: none;"{/if}>
        <a href="{$path}/MyResearch/Home" class='loginLink'>
        {translate text="My Account"}
        </a>
    </span>
</div>

{/if}


{*

<div class="right-header-left">
    <span id="sign-label">Sign as</span>
    <span id="myAccount" {if !$user} style="display: none;"{/if}>
        <a href="{$path}/MyResearch/Home">
        {if strlen($user->displayName) > 0}{$user->displayName}
        {else}{$user->firstname|capitalize} {$user->lastname|capitalize}
        {/if}
        </a>
    </span>

    {if $showLoginButton == 1}
    <span {if $user} style="display: none;"{/if}>
        <a href="{$path}/MyResearch/Home" class='loginLink'>
        {translate text="My Account"}
        </a>
    </span>
    {/if}
</div>

<div class="right-header-right">
    <span {if !$user} style="display: none;"{/if}>
        <a href="{$path}/MyResearch/Logout">{translate text="Sign Out"}</a>
    </span>    
</div>
*}

