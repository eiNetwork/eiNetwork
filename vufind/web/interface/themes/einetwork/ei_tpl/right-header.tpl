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


{*
<div id="right-header-links">
    <div id="right-header-account-links">
        <span id="myAccountNameLink" class="right-header-account-link logoutOptions top-header-item"
            {if !$user} style="display: none;"{/if}>
            <a href="{$path}/MyResearch/Home">
            {if strlen($user->displayName) > 0}{$user->displayName}
            {else}{$user->firstname|capitalize} {$user->lastname|capitalize}
            {/if}
            </a>
        </span>

        {if $showLoginButton == 1}
        <span class="right-header-account-link loginOptions top-header-item"
            {if $user} style="display: none;"{/if}>
            <a href="{$path}/MyResearch/Home" class='loginLink'>
            {translate text="My Account"}
            </a>
        </span>
        {/if}
    </div>
    
    
    <div id="right-header-sign-out">
        <span class="right-header-account-link logoutOptions top-header-item"
            {if !$user} style="display: none;"{/if}>
            <a href="{$path}/MyResearch/Logout">
            {translate text="Sign Out"}
            </a>
        </span>
    </div>
    
</div>
*}
