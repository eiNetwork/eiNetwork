<div class ="alignright">
  <input id="userreviewlink{$shortId}" class="userreviewlink button" onclick="$('.userreview').slideUp();$('#userreview{$shortId}').slideDown();" value="Add Review" />

</div>
<div id="userreview{$shortId}" class="userreview">
  <span class ="alignright unavailable closeReview" onclick="$('#userreview{$shortId}').slideUp();" >
    Close
    </span>
  <div class='addReviewTitle'>
    Add your Review
  </div>
  {include file="Record/submit-comments.tpl"}
</div>