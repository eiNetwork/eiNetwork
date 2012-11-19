<script type="text/javascript">
$(document).ready(function() {literal} { {/literal}
  doGetStatusSummaries();
  doGetRatings();
  {if $user}
  doGetSaveStatuses();
  {/if}
{literal} }); {/literal}

function swapDiv(event,elem){
         var temp = elem.nextSibling.nextSibling;
         var prev = elem.previousSibling.previousSibling;
         var Targetdiv  = prev.value;
         var currentdiv = elem.parentElement.id.substring(0,1);
         var Id = prev.value+'X';
         var target = document.getElementById(Id.toString());
         var parent = elem.parentElement.innerHTML; 
         
         if(currentdiv > Targetdiv)
           {
              var prevnode = target.innerHTML;
              //alert(prevnode);
              var temp34;
              document.getElementById(Id.toString()).innerHTML = elem.parentElement.innerHTML;
              for(var i = parseInt(Targetdiv)+ parseInt(1) ; i <= currentdiv  ; i++)
                  {
                    var Id = i+'X';
                    var curenode = document.getElementById(Id.toString());
                    temp34 = curenode.innerHTML;
                    curenode.innerHTML = prevnode;
                    prevnode = temp34;  
                  }
              //alert ('Bubble-UP');
           }
         else
           {
               //bubble Down
               var prevnode = target.innerHTML;
              //alert(prevnode);
              var temp34;
              document.getElementById(Id.toString()).innerHTML = elem.parentElement.innerHTML;
              for(var i = parseInt(Targetdiv)- parseInt(1) ; i >= currentdiv  ; i--)
                  {
                    var Id = i+'X';
                    var curenode = document.getElementById(Id.toString());
                    temp34 = curenode.innerHTML;
                    curenode.innerHTML = prevnode;
                    prevnode = temp34;  
                  } 
                 //alert ('Bubble-Down');
           }
         //alert(temp.innerHTML);
         //alert(prev.value+'X');
   /*
   var Id = prev.value+'X';
    //var actualvalue = elem.parent; 
    // var parent=elem.parentNode;
    // alert(parent.);
    var target = document.getElementById(Id.toString());
    var temp1 = target.innerHTML;
    //alert(temp1);
    target.innerHTML = elem.parentElement.innerHTML; 
    //alert (target.innerHTML);
    //var parent2 = target.parentNode;   
    //target.removeChild();
    // elem.parentNode.insertBefore(elem,elem.parentNode.firstChild);*/
    }

</script>

<form id="addForm" action="{$url}/MyResearch/HoldMultiple">
	<div id="addFormContents">


		{* Make sure to trigger the proper events when selecting and deselecting *}
		{*<div class='selectAllControls'> 
		  <a href="#" onclick="$('.titleSelect').not(':checked').attr('checked', true).trigger('click').attr('checked', true);return false;">Select All</a> /
		  <a href="#" onclick="$('.titleSelect:checked').attr('checked', false).trigger('click').attr('checked', false);return false;">Deselect All</a>
		</div>
		*} 
		{foreach from=$recordId item=recid}
			{$recid}
		{/foreach}

		{foreach from=$recordSet item=record name="recordLoop" key=val}
		  {*<div class="result {if ($smarty.foreach.recordLoop.iteration % 2) == 0}alt{/if} record{$smarty.foreach.recordLoop.iteration}">*}
		    {* This is raw HTML -- do not escape it: *}
		  

<td><form action="" method="post"> <input type="text" value={$val} name="bookID" style="width:14px;"> <input type="submit" value="Boost" name="Boost"></form></td>
<div <div class="result record{$smarty.foreach.recordLoop.iteration}">
		    {$record}

		  </div></td></tr>
		{/foreach}

		<input type="hidden" name="type" value="hold" />
		<div class='selectAllControls'>
		  <a href="#" onclick="$('.titleSelect').not(':checked').attr('checked', true).trigger('click').attr('checked', true);return false;">Select All</a> /
		  <a href="#" onclick="$('.titleSelect:checked').attr('checked', false).trigger('click').attr('checked', false);return false;">Deselect All</a>
		</div>
		
		{if $enableMaterialsRequest}
			<div id="materialsRequestInfo">
				Can't find what you are looking for? Try our <a href="{$path}/MaterialsRequest/NewRequest">Materials Request Service</a>.
			</div>
		{/if}
		
		{if !$enableBookCart}
		<input type="submit" name="placeHolds" value="Request Selected Items" class="requestSelectedItems"/>
		{/if}
	</div>
</form>

{if $showStrands}
{* Add tracking to strands based on the user search string.  Only track searches that have results. *}
{literal}
<script type="text/javascript">

//This code can actually be used anytime to achieve an "Ajax" submission whenever called
if (typeof StrandsTrack=="undefined"){StrandsTrack=[];}

StrandsTrack.push({
   event:"searched",
   searchstring: "{/literal}{$lookfor|escape:"url"}{literal}"
});

</script>
{/literal}
{/if}
