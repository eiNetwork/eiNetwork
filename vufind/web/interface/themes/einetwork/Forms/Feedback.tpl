<div id="page-content" class="content">
    <div id="left-bar"></div>
    <div id="main-content">
        {if $formsubmitErrors}
            <div class="error">{$formsubmitErrors}</div>
        {/if}
        {if $submit}
            Thank you for the feedback.
        {else}
            <div><h2>Feedback</h2></div>
            <form id="feedback" name="feedback-form" action="/Forms/Feedback" style="margin-left: 10px" method="post" onsubmit="return checkNewCard()">
                <div id="name" class="require" style="display: inline-block">
                    <div >
                        Name
                        <span class="error">*required</span>
                    </div>
                    <div>
                        <input name="name_input" id="name_input" type="text" class="required text"/>
                    </div>
                    <div class="errorMessage" id="nameError" style="display:table-cell"></div>
                </div>
                <div class="email require" style="display:inline-block;margin-left: 20px">
                    <div>
                        Email Address
                    </div>
                    <input name="email" type="text" class="text" id="email"/>
                    <div id="emailError" class="errorMessage" style='display:table-cell'></div>
                </div>
                <input type="hidden" id="useragent" name="useragent"/>
                <div class="feedback-area require" style="margin-top: 20px">
                    <div>
                        <p><span>Feedback</span><span id="feedbackError" class="errorMessage" style='display:inline;margin-left: 10px'></span></p>
                    </div>
                    <textarea name="feedback-textarea" id="feedback-textarea" rows="12" cols="75" style="resize: none"></textarea>
                </div>
                <input id="submit" name="submit" class="yellow button" type="submit" onclick="" value="Submit" style="margin-left: 555px" />
            </form>
        {/if}
    </div>
    <div id="right-bar">
	{include file="MyResearch/menu.tpl"}
	{include file="Admin/menu.tpl"}
    </div>  
</div>
<script type="text/javascript">
{literal}
var nameValid = false;
var emailValid = false;
var feedbackVaild = false;
	$(document).ready(function(){
		//$("#getacard").validate();
		$("#useragent").val(navigator.userAgent);
                $('#email').blur(function(){
			//alert("adf");
			var email=$('[name=email]').val(),
		            emailReg=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                        if(!emailReg.test(email)){
				$('#emailError').text("*please enter a vaild email address");
			}else{
				emailValid = true;
				$('#emailError').html('&nbsp;');
			}
		});
                //alert(navigator.userAgent);
		/*
		$('#name_input').blur(function(){
			var name = $('#name_input').val();
			if(!name){
				$('#nameError').text("*required");
				nameValid = false;
			}else{
				$('#nameError').text("");
				nameValid = true;
			}
		});*/
                $('#feedback-textarea').blur(function(){
			var feedback = $(this).val();
			if(!feedback){
				$('#feedbackError').text("*required");
				feedbackVaild = false;
			}else{
				$('#nameError').text("");
				feedbackVaild = true;
			}
		});	
	});
	function checkNewCard(){
		if(feedbackVaild&&emailValid){
			return true;
		}else{
			/*
                         *window.scrollTo(0,0);
                         *var name = $('#name_input').val();
			if(!name){
				$('#nameError').text("*required");
				nameValid = false;
			}else{
				nameValid = true;
			}
			var email=$('#email').val();
			if(!email){
				$('#emailError').text("*required");
				emailValid=false;
			}*/
                        var feedback=$('#feedback').val();
			if(!email){
				$('#feedbackError').text("*required");
				feedbackVaild=false;
			}
			return false;
		}
	}
{/literal}
</script>