{strip}
   <div class="bookcart">
      <div id="cart-image">
	<img src="/interface/themes/einetwork/images/Art/Materialicons/ShoppingCart.png"  alt="cart" style="vertical-align:middle"/>
	<span id="cart-descrpiion" style="vertical-align:middle"></span>
      </div>
      <div id="blank">&nbsp;</div>
      <input type="button" class="button" id="view_cart_button" onclick="getViewCart()" value="View Cart">
    </div>
   
    <div class="separator"><hr/></div>
    
    <div class="account-links">
        <div id="wish-lists">
            <a href="/List/Results">Wish Lists</a>
        </div>
	 <div id="my-item">
            <a href="/MyResearch/CheckedOut">Checked Out Items {if $profile.numCheckedOut} ({$profile.numCheckedOut}){/if}</a>
        </div>
	<div id="my-request">
          <a href="/MyResearch/Holds">Requested Items{if $profile.numHoldsAvailable} ({$profile.numHoldsAvailable+$profile.numHoldsRequested}){/if}</a>
        </div>
	<div id="reading-history">
            <a href="/MyResearch/ReadingHistory">Reading History</a>
        </div>
        <div id="history">
            <a href="/Search/History">Search History</a>
        </div>
        <div id="account-settings">
            <a href="/MyResearch/Profile">Account Settings</a>
        </div>
        
    </div>
    
   
    <div class="separator"><hr/></div>
    
    <div class="prefer-branch">
        <div id="description">
            Your Preferred Branches
        </div>
        
        <div id="blank">&nbsp;</div>
        <div>
            <a href="/MyResearch/Profile">
	      <input id="edit-button" class="button" value="Edit"/>
	    </a>
        </div>
    </div>
    
    <div class="separator"><hr/></div>
    
    <div class="recommendations">
        <div id="new-books">
            <a>New Books</a>
        </div>
        <div id="new-movies">
            <a>New Movies</a>
        </div>
        <div id="staff-picks">
            <a>Staff Picks</a>
        </div>
        <div id="award-winning">
            <a>Award Winning</a>
        </div>
        <div id="audio-books">
            <a>Audio Books</a>
        </div>
        <div id="kids-book">
            <a>Books for Kids</a>
        </div>
        <div id="cookbooks">
            <a>Cookbooks</a>
        </div>
        <div id="rate-specility">
            <a>Rare and Specialty</a>
        </div>
        
    </div>
{*if $user != false}
  <div id="myAccountLinks">
    <br/><br/>
    <div class="myAccountLink{if $pageTemplate=="checkedout.tpl"} active{/if}"><a href="{$path}/MyResearch/CheckedOut">{translate text='Checked Out Items'}{if $profile.numCheckedOut} ({$profile.numCheckedOut}){/if}</a></div>
    <div class="myAccountLink{if $pageTemplate=="holds.tpl"} active{/if}"><a href="{$path}/MyResearch/Holds">{translate text='Requested Items'}{if $profile.numHoldsAvailable} ({$profile.numHoldsAvailable+$profile.numHoldsRequested}){/if}</a></div>
    <br/><br/>
    <div class="myAccountLink{if $pageTemplate=="favorites.tpl"} active{/if}"><a href="{$path}/MyResearch/Favorites">{translate text='Suggestions, Lists &amp; Tags'}</a></div>
    <div class="myAccountLink{if $pageTemplate=="readingHistory.tpl"} active{/if}"><a href="{$path}/MyResearch/ReadingHistory">{translate text='My Reading History'}</a></div>
    {if $enableMaterialsRequest}
    <div class="myAccountLink{if $pageTemplate=="myMaterialRequests.tpl"} active{/if}" title="Materials Requests"><a href="{$path}/MaterialsRequest/MyRequests">{translate text='Materials Requests'} ({$profile.numMaterialsRequests})</a></div>
    {/if}
    <div class="myAccountLink{if $pageTemplate=="profile.tpl"} active{/if}"><a href="{$path}/MyResearch/Profile">{translate text='Profile'}</a></div>
    <div class="myAccountLink{if $user && $pageTemplate=="history.tpl"} active{/if}"><a href="{$path}/Search/History?require_login">{translate text='history_saved_searches'}</a></div>
  </div>
{/if*}
{/strip}
<script type="text/javascript">
getOverDriveSummary();
</script>