<div id="{$title}" class="popup">
        <div class="all-filters">
            <div id="filter-name"><b>{translate text=$cluster.label}</b></div>
           
            <div id="close" >
                <a href="#" onclick="closePopup('{$title}');return false;">close</a>
            </div>
        </div>
        <div class="filter-list">
                
                <div id="list1">
                {foreach from=$cluster.list item=thisFacet name="narrowLoop"}
                {if $smarty.foreach.narrowLoop.iteration < 10}	
                <input  type="checkbox" name="color" value="{$thisFacet.display|escape}"/>{$thisFacet.display|escape}({$thisFacet.count|escape})
                <br/>
                {/if}
                {/foreach}					
                </div>
                
                <div id="list2">
                {foreach from=$cluster.list item=thisFacet name="narrowLoop"}
                {if $smarty.foreach.narrowLoop.iteration >= 10 && $smarty.foreach.narrowLoop.iteration<=20}
                <input  type="checkbox" name="color" value="{$thisFacet.display|escape}"/>{$thisFacet.display|escape}({$thisFacet.count|escape})
                <br/>
                {/if}
                {/foreach}						
                </div>
                
                <div id="list3">
                {foreach from=$cluster.list item=thisFacet name="narrowLoop"}
                {if $smarty.foreach.narrowLoop.iteration >20 && $smarty.foreach.narrowLoop.iteration<=30}
                <input  type="checkbox" name="color" value="{$thisFacet.display|escape}"/>{$thisFacet.display|escape}({$thisFacet.count|escape})
                <br/>
                {/if}
                {/foreach}						
                </div>
        </div>
</div>