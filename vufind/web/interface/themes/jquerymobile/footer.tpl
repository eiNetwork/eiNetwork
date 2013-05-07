{if isset($boopsieLink)}
  <span style="float:right;"><a href="{$boopsieLink}" rel="external" onclick="window.open (this.href, 'child'); return false">{translate text='Download our mobile App'}</a></span>
{/if}

<div class="footer-text"><a href="#" class="standard-view" rel="external">{translate text="Full Site"}</a></div>

<div data-role="footer" data-theme="a">
  {* if a module has footer-navbar.tpl, then use it, otherwise use default *}
  {assign var=footer_navbar value="$module/footer-navbar.tpl"|template_full_path}
  {if !empty($footer_navbar)}
    {* include module specific navbar *}
    {include file=$footer_navbar}
  {else}
    <div data-role="navbar">
      <ul>
        {* default to Language, Account and Logout buttons *}
        <li><a data-rel="dialog" href="#Language-dialog" data-transition="pop">{translate text="Language"}</a></li>
        <li><a rel="external" href="{$path}/MyResearch/Home">{translate text="My Account"}</a></li>
        {if $user}
          <li><a rel="external" href="{$path}/MyResearch/Logout">{translate text="Logout"}</a></li>          
        {/if}
      </ul>
    </div>
  {/if}
</div>
