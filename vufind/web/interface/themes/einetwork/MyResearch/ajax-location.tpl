<div id="preferred_alternative" class="profile_row">
    <div style="font-size:16px;margin-bottom:5px">Your Preferred Branches</div>
    <div style="font-size:14px;margin-left:10px">
        {if $edit == true}
        {html_options name="myLocation1" options=$locationList selected=$profile.myLocation1Id}
        {else}{$profile.myLocation1|escape}
        {/if}
    </div>
    <div style="font-size:14px;margin-left:10px">
        {if $edit == true}
        {html_options name="myLocation2" options=$locationList selected=$profile.myLocation2Id}
        {else}{$profile.myLocation2|escape}
        {/if}
    </div>
    <div>
        <a href="/MyResearch/Profile">
          <input id="edit-button" class="button" value="Edit" style="margin-left:0px;margin-top:5px"/>
        </a>
    </div>
</div>	