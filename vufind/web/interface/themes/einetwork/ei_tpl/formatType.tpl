<div class="Format_type">
        {if is_array($summFormats)}
        {foreach from=$summFormats item=format}
    	{if $format eq "Print Book"} 
    	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Book.png"/ alt="Print Book"></span>
	{elseif $format eq "DVD"}
	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DVD.png"/ alt="DVD"></span>
	{elseif $format eq "Music CD"}
	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicCD.png"/ alt="Music CD"></span>
	{elseif $format eq "Blu-Ray"}
	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BluRay.png"/ alt="Blu Ray"></span>
	{elseif $format eq "Video Download"}
	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Video Download"></span>
	{elseif $format eq "CD-ROM"}
	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DVD.png"/ alt="Video Download"></span>
    	{/if}
    	<span class="iconlabel" >{translate text=$format}</span>&nbsp;
        {/foreach}
        {else}
    	<span class="iconlabel">{translate text=$summFormats}</span>
        {/if}
    </div>