{* Your footer *}
<div class="footerCol"><p><strong>{translate text='Search Options'}</strong></p>
	<ul>
		{if $user}
		<li><a href="{$path}/Search/History">{translate text='Search History'}</a></li>
		{/if}
		<li><a href="{$path}/Search/Advanced">{translate text='Advanced Search'}</a></li>
		<li><a href="http://www.millennium.marmot.org/search~S8/">{translate text='Classic Catalog'}</a></li>
	</ul>
</div>
<div class="footerCol"><p><strong>{translate text='Find More'}</strong></p>
	<ul>
		<li><a href="http://www.evld.org">{translate text='Coming Soon'}</a></li>
		<li><a href="http://www.evld.org/books">{translate text='New Books, DVDs & CDs'}</a></li>
		<li><a href="{$path}/Browse/Home">{translate text='Browse the Catalog'}</a></li>
		<!-- <li><a href="{$path}/Search/Reserves">{translate text='Course Reserves'}</a></li>
		<li><a href="{$path}/Search/NewItem">{translate text='New Items'}</a></li> -->
		<li><a href="http://marmot.lib.overdrive.com/en/ODAdvantage.htm" rel="external" onclick="window.open (this.href, 'child'); return false">{translate text='Digital Downloads'}</a></li>
	</ul>
</div>
<div class="footerCol"><p><strong>{translate text='Need Help?'}</strong></p>
	<ul>
		<li><a href="{$path}/Help/Home?topic=search" onclick="window.open('{$path}/Help/Home?topic=search', 'Help', 'width=625, height=510'); return false;">{translate text='Search Tips'}</a></li>
		<li><a href="{$askALibrarianLink}" rel="external" onclick="window.open (this.href, 'child'); return false">{translate text='Ask a Librarian'}</a></li>
		{if isset($illLink)}
				<li><a href="{$illLink}" rel="external" onclick="window.open (this.href, 'child'); return false">{translate text='Interlibrary Loan'}</a></li>
		{/if}
		{if isset($suggestAPurchaseLink)}
				<li><a href="{$suggestAPurchaseLink}" rel="external" onclick="window.open (this.href, 'child'); return false">{translate text='Suggest a Purchase'}</a></li>
		{/if}
		<li><a href="{$path}/Help/Home?topic=faq" onclick="window.open('{$path}/Help/Home?topic=faq', 'Help', 'width=625, height=510'); return false;">{translate text='FAQs'}</a></li>
		<li><a href="{$path}/Help/Suggestion">{translate text='Make a Suggestion'}</a></li>
	</ul>
</div>
<br clear="all">
{if !$productionServer}
<div class='location_info'>{$physicalLocation}</div>
{/if}

{* Add Google Analytics*}
{literal}
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-10641564-2']);
	_gaq.push(['_setDomainName', '.marmot.org']);
	_gaq.push(['_trackPageview']);
	_gaq.push(['_trackPageLoadTime']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

</script>
{/literal}