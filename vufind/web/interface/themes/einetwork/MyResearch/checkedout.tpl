<script type="text/javascript" src="{$url}/services/MyResearch/ajax.js"></script>
<script type="text/javascript" src="{$url}/services/EcontentRecord/ajax.js"></script>
<script type="text/javascript" src="{$path}/js/checkedout.js"></script>
{if (isset($title)) }
<script type="text/javascript">
    alert("{$title}");
</script>

{/if}
<div id="page-content" class="content">
    <div id="left-bar">
	<div class="sort">
	    <div id="sortLabel">
		{translate text='Sort by'}
	    </div>
	    <div class="sortOptions">
		<select name="accountSort" id="sort" onchange="changeAccountSort($(this).val());">
		    {foreach from=$sortOptions item=sortDesc key=sortVal}
		    <option value="{$sortVal}"{if $defaultSortOption == $sortVal} selected="selected"{/if}>{translate text=$sortDesc}</option>
		    {/foreach}
		</select>
	    </div>
	</div>
    </div>
    <div id="main-content">
    {if $user->cat_username}
	{if $transList}
	<div>
	    <h2>Checked Out Items</h2>
	</div>
	<form id="renewForm" action="{$path}/MyResearch/RenewMultiple">
	    {*******BEGIN checked out item list*****}
	    <div class="item_renew">
		<h3>{translate text='Physical Checked Out Items'}</h3>
		{if $patronCanRenew}
			<div class="item_renew" style="text-align:right; padding-right:25px; padding-bottom:10px;" >
			<a href="#" onclick="return renewSelectedTitles();" class="button"> Renew Selected Items</a>
			</div>
		{else}
		    <font color="red"><b>Our apologies, you cannot renew items if you have overdue items on your account at this time.    </br>You may renew items that are not overdue at <a href=http://catalog.einetwork.net/> http://catalog.einetwork.net </a></b></font>
		{/if}
	    </div>
	    <div class="item_renew">
	    </div>
	    <div class="checkout">
		{foreach from=$transList item=record name="recordLoop" }
		<div id="record{$record.id|escape}" class="item_list {if ($smarty.foreach.recordLoop.iteration % 2) == 0}alt{/if} {if ($smarty.foreach.recordLoop.iteration % 16) == 0}newpage{/if} record{$smarty.foreach.recordLoop.iteration}">
		    <div class="item_image">
			{if $user->disableCoverArt != 1}
			    {if $record.id}
				<a href="{$url}/Record/{$record.id|escape:"url"}" id="descriptionTrigger{$record.id|escape:"url"}">
				    <img src="{$coverUrl}/bookcover.php?id={$record.id}&amp;isn={$record.isbn|@formatISBN}&amp;size=small&amp;upc={$record.upc}&amp;category={$record.format_category.0|escape:"url"}" class="listResultImage" alt="{translate text='Cover Image'}"/>
				</a>
			    {/if}
			{/if}
		    </div>
		    
		    <div class="item_detail">
			<div class="item_subject">
			    {if $record.id}
				<a href="{$url}/Record/{$record.id|escape:"url"}" class="title">
			    {/if}
			    {if !$record.title|regex_replace:"/(\/|:)$/":""}{translate text='Title not available'}{else}{$record.title|regex_replace:"/(\/|:)$/":""|truncate:180:"..."|highlight:$lookfor}{/if}
			    {if $record.id}
				</a>
			    {/if}
			    {if $record.title2}
				<div class="searchResultSectionInfo">
				    {$record.title2|regex_replace:"/(\/|:)$/":""|truncate:180:"..."|highlight:$lookfor}
				</div>
			    {/if}	
			</div>
			
			<div class="item_author">
			    {if $record.author}
				{if is_array($record.author)}
				    {foreach from=$summAuthor item=author}
					<a href="{$url}/Author/Home?author={$author|escape:"url"}">{$author|highlight:$lookfor}</a>
				    {/foreach}
				{else}
				    <a href="{$url}/Author/Home?author={$record.author|escape:"url"}">{$record.author|highlight:$lookfor}</a>
				{/if}
			    {/if}
			    {if $record.publicationDate}{translate text='Published'} {$record.publicationDate|escape}{/if}
			</div>
			
			<div class="item_type">
			    {if is_array($record.format)}
				{foreach from=$record.format item=format}
				    {if $format eq "Print Book"} 
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Book.png"/ alt="Print Book"></span>
				    {elseif $format eq "Audio Book Download"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Audio Book Download"></span>
				    {elseif $format eq "Blu-Ray"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BluRay.png"/ alt="Blu Ray"></span>
				    {elseif $format eq "Large Print"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Book_largePrint.png"/ alt="Large Print"></span>
				    {elseif $format eq "Book on CD"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BookOnCD.png"/ alt="Book on CD"></span>
				    {elseif $format eq "Book on MP3 Disc"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BookOnMp3CD.png"/ alt="Book on MP3 Disc"></span>
				    {elseif $format eq "Book on Tape"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BookOnTape.png"/ alt="Book on Tape"></span>
				    {elseif $format eq "CD-ROM"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/CDROM.png"/ alt="CD-ROM"></span>
				    {elseif $format eq "Electronic Resource"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Electronic Resource"></span>
				    {elseif $format eq "Discussion Kit"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DiscussionKit.png"/ alt="Discussion Kit"></span>
				    {elseif $format eq "DVD"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DVD.png"/ alt="DVD"></span>
				    {elseif $format eq "Ebook Download"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Electronic Equipment"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/ElectronicEquipment.png"/ alt="Electronic Equipment"></span>
				    {elseif $format eq "Print Image"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Image.png"/ alt="Print Image"></span>
				    {elseif $format eq "Digital Image"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Image_digital.png"/ alt="Digital Image"></span>
				    {elseif $format eq "Music LP/Cassette"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/LP.png"/ alt="Music LP/Cassette"></span>
				    {elseif $format eq "Magazine"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Magazine.png"/ alt="Magazine"></span>
				    {elseif $format eq "Online Periodical"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Magazine_online.png"/ alt="Online Periodical"></span>
				    {elseif $format eq "Music CD"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicCD.png"/ alt="Music CD"></span>
				    {elseif $format eq "Music Download"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicDownload.png"/ alt="Music Download"></span>
				    {elseif $format eq "Music Score"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicScore.png"/ alt="Music Score"></span>
				    {elseif $format eq "Online Book"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Online Book"></span>
				    {elseif $format eq "Other Kits"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OtherKit.png"/ alt="Other Kits"></span>
				    {elseif $format eq "Puppet"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Puppet.png"/ alt="Puppet"></span>
				    {elseif $format eq "Puzzle"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Puzzle.png"/ alt="Puzzle"></span>
				    {elseif $format eq "Video Cassette"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VHS.png"/ alt="VHS"></span>
				    {elseif $format eq "Video Download"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Video Download"></span>
				    {elseif $format eq "Adobe EPUB eBook"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Adobe PDF"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Adobe PDF eBook"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "EPUB eBook"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Kindle Book"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Kindle USB Book"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Kindle"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "External Link"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Interactive Book"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Internet Link"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Open EPUB eBook "}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Open PDF eBook"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "Plucker"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "MP3"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "MP3 AudioBook"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "MP3 AudioBook"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "MP3 Audiobook"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "WMA Audiobook"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "WMA Music"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "WMA Video"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "OverDrive MP3 Audiobook"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "OverDrive Music"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "OverDrive WMA Audiobook"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				    {elseif $format eq "OverDrive Video"}
				    <span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Ebook Download"></span>
				    {/if}
				    <span class="iconlabel" >{translate text=$format}</span>&nbsp;
				{/foreach}
			    {else}
				{if $record.format eq "Print Book"} 
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Book.png"/ alt="Print Book"></span>
				{elseif $format eq "Audio Book Download"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Audio Book Download"></span>
				{elseif $format eq "Blu-Ray"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BluRay.png"/ alt="Blu Ray"></span>
				{elseif $format eq "Large Print"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Book_largePrint.png"/ alt="Large Print"></span>
				{elseif $format eq "Book on CD"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BookOnCD.png"/ alt="Book on CD"></span>
				{elseif $format eq "Book on MP3 Disc"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BookOnMp3CD.png"/ alt="Book on MP3 Disc"></span>
				{elseif $format eq "Book on Tape"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BookOnTape.png"/ alt="Book on Tape"></span>
				{elseif $format eq "CD-ROM"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/CDROM.png"/ alt="CD-ROM"></span>
				{elseif $format eq "Electronic Resource"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Electronic Resource"></span>
				{elseif $format eq "Discussion Kit"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DiscussionKit.png"/ alt="Discussion Kit"></span>
				{elseif $format eq "DVD"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DVD.png"/ alt="DVD"></span>
				{elseif $format eq "Ebook Download"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Electronic Equipment"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/ElectronicEquipment.png"/ alt="Electronic Equipment"></span>
				{elseif $format eq "Print Image"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Image.png"/ alt="Print Image"></span>
				{elseif $format eq "Digital Image"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Image_digital.png"/ alt="Digital Image"></span>
				{elseif $format eq "Music LP/Cassette"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/LP.png"/ alt="Music LP/Cassette"></span>
				{elseif $format eq "Magazine"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Magazine.png"/ alt="Magazine"></span>
				{elseif $format eq "Online Periodical"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Magazine_online.png"/ alt="Online Periodical"></span>
				{elseif $format eq "Music CD"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicCD.png"/ alt="Music CD"></span>
				{elseif $format eq "Music Download"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicDownload.png"/ alt="Music Download"></span>
				{elseif $format eq "Music Score"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicScore.png"/ alt="Music Score"></span>
				{elseif $format eq "Online Book"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Online Book"></span>
				{elseif $format eq "Other Kits"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OtherKit.png"/ alt="Other Kits"></span>
				{elseif $format eq "Puppet"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Puppet.png"/ alt="Puppet"></span>
				{elseif $format eq "Puzzle"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Puzzle.png"/ alt="Puzzle"></span>
				{elseif $format eq "Video Cassette"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VHS.png"/ alt="VHS"></span>
				{elseif $format eq "Video Download"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Video Download"></span>
				{elseif $format eq "Adobe EPUB eBook"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Adobe PDF"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Adobe PDF eBook"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "EPUB eBook"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Kindle Book"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Kindle USB Book"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Kindle"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "External Link"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Interactive Book"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Internet Link"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Open EPUB eBook "}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Open PDF eBook"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "Plucker"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "MP3"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "MP3 AudioBook"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "MP3 AudioBook"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "MP3 Audiobook"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "WMA Audiobook"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "WMA Music"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "WMA Video"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "OverDrive MP3 Audiobook"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "OverDrive Music"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "OverDrive WMA Audiobook"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "OverDrive Video"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Ebook Download"></span>
				{elseif $format eq "OverDrive Read"}
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
				{/if}
				<span class="iconlabel" >{translate text=$record.format}</span>
			    {/if}
			</div>
		    </div>
		    
		    <div class="item_status">
			Due On&nbsp;{$record.duedate|date_format}
			{if $record.overdue}
			    <span class='overdueLabel'>OVERDUE</span>
			{elseif $record.daysUntilDue == 0}
			    <span class='dueSoonLabel'>(Due today)</span>
			{elseif $record.daysUntilDue == 1}
			    <span class='dueSoonLabel'>(Due tomorrow)</span>
			{elseif $record.daysUntilDue <= 7}
			    <span class='dueSoonLabel'>(Due in {$record.daysUntilDue} days )</span>
			{/if}
			{if $record.renewCount == 1}
			    <span class='dueSoonLabel'>Renewed&nbsp;{$record.renewCount}&nbsp;time</br></span>
			{elseif $record.renewCount > 1}
			    <span class='dueSoonLabel'>Renewed&nbsp;{$record.renewCount}&nbsp;times</br></span>
			{/if}
			{*if $record.fine}
			    <span class='overdueLabel'>FINE {$record.fine}</div>
			{/if*}
			{*******BEGIN renew******}
			
			{if $patronCanRenew}
			<div class="item_renew">
			    {assign var=id value=$record.id scope="global"}
			    {assign var=shortId value=$record.shortId scope="global"}
			    {* disable renewals if the item is overdue *}  
			    {if $record.overdue}
				<input type="checkbox" disabled="disabled" name="selected[{$record.renewIndicator}]" class="titleSelect" id="selected{$record.itemid}" />&nbsp;&nbsp;Renew&nbsp;			    
<!--				<input id="userreviewlink{$shortId}" type="button" disabled="disabled" class="userreviewlink button" onclick="renewItem('/MyResearch/Renew?itemId={$record.itemid}')" value="Renew" />
-->			    {else}
<!--				<input id="userreviewlink{$shortId}" type="button" class="userreviewlink button" onclick="renewItem('/MyResearch/Renew?itemId={$record.itemid}&itemBarCode={$record.barcode}')" value="Renew" />
-->				<input type="checkbox" name="selected[{$record.renewIndicator}]" class="titleSelect" id="selected{$record.itemid}" />&nbsp;&nbsp;Renew&nbsp;
			    {/if}
			    {if $record.renewMessage}
				<div class='{if $record.renewResult == true}renewPassed{else}renewFailed{/if}' style="margin-top:10px">
				{$record.renewMessage|escape}
			      </div>
			    {/if}
			</div>
			{/if}
			{*******END renew******}
		    </div>
		</div>
		{/foreach}
	    </div>
	    {*******END checked out item list*****}
	    
	    
	    
	    {*******BEGIN Overdrive items*********}
	    <div>
		<h3>{translate text='eContent Checked Out Items'}</h3>
	    </div>
	    {if $user}
	    {if count($overDriveCheckedOutItems) > 0}
		<div class="checkout">
			{foreach from=$overDriveCheckedOutItems item=record}
			<div id="record{$record.overDriveId}">
				<div class="item_image">
					<img src="{$record.imageUrl}">
				</div>
				<div class="item_detail">
					<div class="item_subject">
					    {if $record.recordId != -1}
						<a href="{$path}/EcontentRecord/{$record.recordId}/Home" class="title">
					    {/if}
					    {$record.title}
					    {if $record.recordId != -1}
						    </a>
					    {/if}
					    {if $record.subTitle}<br/>{$record.subTitle}{/if}
					</div>
					<div class="item_author">
						{if strlen($record.record->author) > 0}<br/>{$record.record->author}{/if}
					</div>
					{if $record.earlyReturn == 1}
					
					<input class="button" type="button" value="Return" style="background-color:#F8F8F8;margin-left: -8px;" onclick="returnOverDriveItem('{$record.overDriveId}', '{$record.transactionId}')"/>
					
					{/if}

					<div class="item_type">
					    
					    {if is_array($record.format)}
					    <span></span>
					    {elseif $record.format|rtrim eq "Kindle Book"}
						<span>
						<img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download">
						</span>
					    {elseif $record.format|rtrim eq "Adobe PDF eBook"}
						<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
					    {elseif $record.format|rtrim eq "OverDrive MP3 Audiobook"}
						<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
					    {/if}
					    {$record.format}
					</div>
				</div>
				<div class="item_status" style="width: 140px">
					{if $record.expiresOn}
					    Expires on&nbsp;{$record.expiresOn|date_format}
					{/if}
					<input class="button" type="button" value="Download" onclick='DownloadCheckedoutOverdrive({$record.recordId},{$record.lockedFormat})'/>
					{if $record.hasRead == true}
					<input class="button" type="button" value="Read" onclick="downloadOverDriveItem('{$record.overDriveId}','610')"/>
					{/if}
				</div>
			</div>
			{/foreach}
		</div>
	    {else}
		<div class='noItems' style="margin-left: 15px;">You do not have any titles from OverDrive checked out</div>
	    {/if}
	    {/if}
	    {*******END Overdrive items*********}
	</form>
	
	

	{else}
	    {translate text='You do not have any physical items checked out'}.
	     {*******BEGIN Overdrive items*********}
	    <div>
		{translate text='eContent Checked Out Items'}
	    </div>
	    {if $user}
	    {if count($overDriveCheckedOutItems) > 0}
		<div class="checkout">
			{foreach from=$overDriveCheckedOutItems item=record}
			<div id="record{$record.overDriveId}">
				<div class="item_image">
					<img src="{$record.imageUrl}">
				</div>
				<div class="item_detail">
					<div class="item_subject">
					    {if $record.recordId != -1}
						<a href="{$path}/EcontentRecord/{$record.recordId}/Home" class="title">
					    {/if}
					    {$record.title}
					    {if $record.recordId != -1}
						    </a>
					    {/if}
					    {if $record.subTitle}<br/>{$record.subTitle}{/if}
					</div>
					<div class="item_author">
						{if strlen($record.record->author) > 0}<br/>{$record.record->author}{/if}
					</div>
					{if $record.earlyReturn == 1}
					
					<input class="button" type="button" value="Return" style="background-color:#F8F8F8;margin-left: -8px;" onclick="returnOverDriveItem('{$record.overDriveId}', '{$record.transactionId}')"/>
					
					{/if}					
					<div class="item_type">
					    
					    {if is_array($record.format)}
					    <span></span>
					    {elseif $record.format|rtrim eq "Kindle Book"}
						<span>
						<img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download">
						</span>
					    {elseif $record.format|rtrim eq "Adobe PDF eBook"}
						<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
					    {elseif $record.format|rtrim eq "OverDrive MP3 Audiobook"}
						<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
					    {/if}
					    {$record.format}
					</div>
				</div>
				<div class="item_status">
					<input class="button" type="button" value="Download" onclick='DownloadCheckedoutOverdrive({$record.recordId},{$record.lockedFormat})'/>
					{if $record.hasRead == true}
					<input class="button" type="button" value="Read" onclick="downloadOverDriveItem('{$record.overDriveId}','610')"/>
					{/if}
				</div>
			</div>
			{/foreach}
		</div>
	    {else}
		<div class='noItems'>You do not have any titles from OverDrive checked out</div>
	    {/if}
	    {/if}
	    {*******END Overdrive items*********}
	{/if}
	{else}
	    You must login to view this information. Click <a href="{$path}/MyResearch/Login">here</a> to login.
	{/if}
    </div>
    
    <div id="right-bar">
	{include file="MyResearch/menu.tpl"}
	{include file="Admin/menu.tpl"}
    </div>
    
</div>