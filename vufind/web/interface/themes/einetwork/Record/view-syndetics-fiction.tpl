{literal}
<script>
	$(document).ready(function(){
		if($('#fictionSub').length == 0){
			$('.fictionProfile_link').append("<div id='fictionSub' />");
			{/literal}{foreach from=$fictionData item=item key=heading}{literal}  
			$('#fictionSub').append('<div id="{/literal}{$heading}_link" class="fiction_sub_head"><a href="#{$heading|escape}" >{$heading|capitalize|escape}</a></div>{literal}');
			$('#{/literal}{$heading}_link a').click(function{literal}(){
				var x = $(this).attr('href');
			$('.fictionProfile a[name='+x.substring(1)+']').get(0).scrollIntoView();
			$('html, body').animate({scrollTop:0}, 0);
			return false;
			});
			{/literal}{/foreach}{literal}
	  	}
	});
</script>
{/literal}
<div class='fictionProfile'>
	<div class='fictionProfileTitle'><a name="characters">Characters</a></div>
	{foreach from=$fictionData.characters item=character}
		<div class='fictionCharacter'>
			<span class='fictionCharacterName'><a href="/Union/Search?basicType=keyword&lookfor={$character.name}">{$character.name}</a></span>
			<div class='fictionCharacterGender'>{$character.gender}&nbsp;{$character.age}</div>
			<div class='fictionCharacterOccupation'>{$character.occupation}</div>
			<div class='fictionCharacterDescription'>{$character.description}</div>
		</div>
	{/foreach}
	
	{if isset($fictionData.topics)}
	<div class='fictionProfileTitle'><a name="topics">Topics</a></div>
	<div class='fictionTopics'>
	{foreach from=$fictionData.topics item=topic}
	<div class='fictionTopic'><a href="/Union/Search?basicType=keyword&lookfor={$topic}"> {$topic}</a></div>
	{/foreach}
	</div>
	{/if}
	
	{if isset($fictionData.settings)}
	<div class='fictionProfileTitle'><a name="settings">Settings</a></div>
	<div class='fictionSettings'>
	{foreach from=$fictionData.settings item=setting}
	<div class='fictionSetting'><a href="/Union/Search?basicType=keyword&lookfor={$setting}">{$setting}</a></div>
	{/foreach}
	</div>
	{/if}
	
	{if isset($fictionData.genres)}
	<div class='fictionProfileTitle'><a name="genres">Genres</a></div>
	<div class='fictionGenres'>
	{foreach from=$fictionData.genres item=genre}
	<div class='fictionGenre'><a href="/Union/Search?basicType=keyword&lookfor={$genre.name}">{$genre.name}</a>
		{*foreach from=$genre.subGenres item=subGenre}
		<span class='fictionSubgenre'>--{$subGenre}</span>
		{/foreach*}
	</div>
	{/foreach}
	</div>
	{/if}
	
	<div class='fictionProfileTitle'><a name="awards">Awards</a></div>
	{foreach from=$fictionData.awards item=award}
	<div class='fictionAward'>
	<span class='fictionAwardYear'>{$award.year}</span>
	<span class='fictionAwardName'>{$award.name}</span>
	</div>
	{/foreach}

</div>