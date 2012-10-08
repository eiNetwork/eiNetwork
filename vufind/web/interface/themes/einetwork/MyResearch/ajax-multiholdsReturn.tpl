<div>
    <div id="popupboxContent" class="popupContent" style="margin-top:10;pxoverflow-y:auto;height:auto;max-height:400px;border-bottom:1px solid rgb(238,238,238);">
            {foreach from=$hold_message_data.titles item="title"}	
                <div>
                    <p {if $title.result}style="color: rgb(0,222,0)"{else}style="color: rgb(222,0,0)"{/if}>
                        {$title.title}
                    </p>
                    <p style="margin-left: 20px;color: rgb(255,255,255)">
                        {$title.message}
                    </p>
                </div>
            {/foreach}
    </div>
</div>