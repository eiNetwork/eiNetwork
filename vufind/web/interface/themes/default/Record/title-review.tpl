<div style ="font-size:12px;" class ="alignright"><span id="userreviewlink{$id}" class="add" onclick="$('.userreview').slideUp();$('#userreview{$id}').slideDown();">Add a Review</span></div>
<div id="userreview{$id}" class="userreview">
  <span class ="alignright unavailable closeReview" onclick="$('#userreview{$id}').slideUp();" >Close</span>
  <div class='addReviewTitle'>Add your Review</div>

  {include file="Record/submit-comments.tpl"}
</div>