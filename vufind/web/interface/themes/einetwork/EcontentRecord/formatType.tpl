<div class="Format_type">
        {if is_array($eContentRecord->format())}
           {foreach from=$eContentRecord->format() item=displayFormat name=loop}
	        {if $displayFormat eq "Video Download"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Video Download"></span>
		{elseif $displayFormat eq "Adobe EPUB eBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "Adobe PDF"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "Adobe PDF eBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "EPUB eBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "Kindle Book"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "Kindle USB Book"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "Kindle"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "External Link"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "Interactive Book"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "Internet Link"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "Open EPUB eBook "}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "Open PDF eBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "Plucker"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "MP3"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "MP3 AudioBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "MP3 AudioBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "MP3 Audiobook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "WMA Audiobook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "WMA Music"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "WMA Video"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "OverDrive MP3 Audiobook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "OverDrive Music"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "OverDrive WMA Audiobook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $displayFormat eq "OverDrive Video"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Ebook Download"></span>
		{/if}
		<span class="iconlabel {$displayFormat|lower|regex_replace:"/[^a-z0-9]/":""}">{translate text=$displayFormat}</span>
           {/foreach}
        {else}
		{if $eContentRecord->format eq "Video Download"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Video Download"></span>
		{elseif $eContentRecord->format eq "Adobe EPUB eBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "Adobe PDF"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "Adobe PDF eBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "EPUB eBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "Kindle Book"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "Kindle USB Book"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "Kindle"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "External Link"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "Interactive Book"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "Internet Link"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/OnlineBook.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "Open EPUB eBook "}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "Open PDF eBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "Plucker"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/EbookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "MP3"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "MP3 AudioBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "MP3 AudioBook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "MP3 Audiobook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "WMA Audiobook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "WMA Music"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "WMA Video"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "OverDrive MP3 Audiobook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "OverDrive Music"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "OverDrive WMA Audiobook"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/AudioBookDownload.png"/ alt="Ebook Download"></span>
		{elseif $eContentRecord->format eq "OverDrive Video"}
		<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Ebook Download"></span>
		{/if}
		<span class="iconlabel {$eContentRecord->format()|lower|regex_replace:"/[^a-z0-9]/":""}">{translate text=$eContentRecord->format}</span>
	</if>
</div>