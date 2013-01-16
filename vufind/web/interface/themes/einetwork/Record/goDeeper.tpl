{* Generate links for each go deeper option *}
<div id='goDeeperContent'>
<div id='goDeeperLinks'>
{foreach from=$options item=option key=dataAction}
<div class='goDeeperLink{if $dataAction == 'fictionProfile'} {$dataAction}_link{/if}'><a href='#' onclick="getGoDeeperData('{$dataAction}', '{$id}', '{$isbn}', '{$upc}');return false;" style="color: rgb(153,153,255);">{$option}</a></div>
{/foreach}
</div>
<div id='goDeeperOutput'>{$defaultGoDeeperData}</div>
</div>
<div id='goDeeperEnd'>&nbsp;</div>