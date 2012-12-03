<div id="preferred_alternative" class="profile_row">
    <div style="font-size:16px;margin-bottom:5px">Your Preferred Branches</div>
    <div style="font-size:14px;margin-left:10px">
    	{$home->displayName|escape} (Home)
    </div>
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
        <input id="edit-button" type="button" class="button" value="Edit" onclick="getToUpdatePreferredBranches()"/>
    </div>
</div>
{literal}
    <script type="text/javascript">
        function getToUpdatePreferredBranches(){
             $.ajax({
                type: 'post',
                url: "/MyResearch/AJAX?method=getToUpdatePreferredBranches",
                dataType: "html",
                data: '',
                success: function(data) {
                    //alert(data);
                    $("#prefer-branch").html(data);
                },
                error: function() {
                        $('#popupbox').html(failMsg);
                        setTimeout("hideLightbox();", 3000);
                }
            });
        }
    </script>
{/literal}