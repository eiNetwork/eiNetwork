<div class="Format_type">
        {if is_array($summFormats)}
		{foreach from=$summFormats item=format}
		{include file="ei_tpl/formatTypeCore.tpl"}
		{/foreach}
        {else}
		<span class="iconlabel">{translate text=$summFormats}</span>
        {/if}
</div>