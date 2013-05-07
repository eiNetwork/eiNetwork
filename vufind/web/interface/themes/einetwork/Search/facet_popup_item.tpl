{php}
	$this->assign('page_num', ceil($this->get_template_vars('page') / 3));
{/php}
<div id="page_{$page_num}" class="column{if $page %3 == 0 && $page_num !=0 } last{/if}"{if $page > 3} style="display:none"{/if}>
	{foreach from=$clist  item=thisFacet name="narrowLoop"}
		<div class="option indent{$thisFacet.indent}" data-parent="cat{$thisFacet.parent}" id=cat{$thisFacet.id}>
			{if $thisFacet.parent != -1}
				<span class="checkbox dark unchecked" onclick="toggleCheck('cat{$thisFacet.id}')" value="{$thisFacet.value}"></span>
				<span class="optionLabel" onclick="toggleLabel(this)">
					{$thisFacet.display|escape}{if $thisFacet.count != ''} ({$thisFacet.count}){/if}
				</span>
			{else}
				<span class="checkbox dark {$thisFacet.display|lower|substr:0:4}" onclick="showPage({$thisFacet.value}, '{$thisFacet.display|lower|substr:0:4}')"></span>
				<span class="optionLabel {$thisFacet.display|lower|substr:0:4}"  onclick="showPage({$thisFacet.value}, '{$thisFacet.display|lower|substr:0:4}')">
					{$thisFacet.display|escape}
				</span>
			{/if}
		</div>
	{/foreach}
</div>