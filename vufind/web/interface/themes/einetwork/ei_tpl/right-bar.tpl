{strip}
<div id="right-bar">
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
            <a onclick='getWishList()'>Wish Lists</a>
        </div>
	 <div id="my-item">
            <a onclick='getCheckedOutItem()'>Checked Out Items {if $profile.numCheckedOut} ({$profile.numCheckedOut}){/if}</a>
        </div>
	<div id="my-request">
          <a onclick='getRequestedItem()' >Requested Items{if $profile.numHoldsAvailable} ({$profile.numHoldsAvailable+$profile.numHoldsRequested}){/if}</a>
        </div>
	<div id="reading-history">
            <a onclick='getReadingHistory()' >Reading History</a>
        </div>
        <div id="history">
            <a href="/Search/History">Search History</a>
        </div>
        <div id="account-settings">
            <a onclick='getAccountSetting()'>Account Settings</a>
        </div>
        
        
        
        
        
        {*}
        <div id="wish-lists">
            <a href="/List/Results">Wish Lists</a>
        </div>
        <div id="history">
            <a href="/Search/History">Search History</a>
        </div>
        <div id="my-item">
            <a href="/MyResearch/CheckedOut">Checked Out Items</a>
        </div>
        <div id="my-request">
            <a href="/MyResearch/Holds">Requests Items</a>
        </div>
        <div id="account-settings">
            <a href="/MyResearch/Profile">Account Settings</a>
        </div>
        <div id="reading-history">
            <a href="/MyResearch/ReadingHistory">My Reading History</a>
        </div>
        *}
    </div>
    
    
    <div class="separator"><hr/></div>
    
    <div class="prefer-branch">
        <div id="description">
            Your Preferred Branches
        </div>
        {*
        <div id="branch-name">
            Carnegie Library Main
        </div>
        *}
        <div id="blank">&nbsp;</div>
         <a href="/MyResearch/Profile">
	      <input id="edit-button" class="button" value="Edit"/>
	    </a>
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
</div>
{/strip}