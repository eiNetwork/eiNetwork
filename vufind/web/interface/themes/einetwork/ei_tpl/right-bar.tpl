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
            <a onclick='getCheckedOutItem()'>Checked Out Items <span id="my-item-PlaceHolder"></span></a>
        </div>
	<div id="my-request">
          <a onclick='getRequestedItem()' >Requested Items<span id="my-ruest-item-placeHolder"></span></a>
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
    </div>
    {literal}
	<script type="text/javascript">
	    $("#my-item-PlaceHolder").ready(function(){
		$.getJSON(path + '/MyResearch/AJAX?method=getAllItems', function (data){
		    if (data.error){
		    }else{
			if(data.SumOfCheckoutItems != 0){
			    $("#my-item-PlaceHolder").text("("+data.SumOfCheckoutItems+")");
			}
			if(data.SumOfRequestItems != 0){
			    $("#my-ruest-item-placeHolder").text(" ("+data.SumOfRequestItems+")");
			}
			setInterval("getRequestAndCheckout()",2000);
		    }
		}
		)
	    }
	);
	</script>
    {/literal}
    {literal}
	<script type="text/javascript">
	    function getRequestAndCheckout(){
	    $.getJSON(path + '/MyResearch/AJAX?method=getAllItems', function (data){
		if (data.error){
		}else{
		    if(data.SumOfCheckoutItems != 0){
			$("#my-item-PlaceHolder").text("("+data.SumOfCheckoutItems+")");
		    }
		    if(data.SumOfRequestItems != 0){
			$("#my-ruest-item-placeHolder").text(" ("+data.SumOfRequestItems+")");
		    }
		}
	    }
	    )
	    }
        </script>
    {/literal}
    
    <div class="separator" id="topBar" style="display:none;"><hr/></div>
    
    <div class="prefer-branch" id="prefer-branch">
        <div id="description">
            Your Preferred Branches
        </div>
	<input id="edit-button" class="button" type="button" value="Edit" onclick="getToUpdatePreferredBranches()"/>
    </div>
    {literal}
    <script type="text/javascript">
	$("#prefer-branch").ready(function(){
	    $.ajax({
		type: 'get',
                url: "/MyResearch/AJAX?method=getLocations",
		dataType:"html",
		success: function(data) {
		    $("#prefer-branch").html(data);
			 if(data){
				$("#topBar").css("display","block");
			}
		},
		error: function() {
			$('#popupbox').html(failMsg);
			setTimeout("hideLightbox();", 3000);
		}
	    });
	    
	    })
    </script>
    {/literal}
    
    
    <div class="separator"><hr/></div>

   {php}
        global $interface;
   
	$tmpList1 = new User_list();
	$tmpList1->id = 1;    
	$tmpList1->find();
	while ($tmpList1->fetch()){
	    $title1 = $tmpList1->title;
    	}
	$interface->assign("Title1", $title1 );
	
	$tmpList2 = new User_list();
	$tmpList2->id = 2;    
	$tmpList2->find();
	while ($tmpList2->fetch()){
	    $title2 = $tmpList2->title;
    	}
	$interface->assign("Title2", $title2 );
		
    {/php}    
    <div class="recommendations">
        <div id="title1">
            <a href="{$url}/MyResearch/MyList/1">{$Title1}</a>
        </div>
        <div id="title2">
            <a href="{$url}/MyResearch/MyList/2">{$Title2}</a>
        </div>
        <div id="articles">
            <a href="http://articles.einetwork.net">Databases and Articles</a>
        </div>
        
    </div>
</div>
{/strip}