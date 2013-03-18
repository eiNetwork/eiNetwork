<script>
    
    function sendEmail(){literal}{{/literal}
        
        var email = document.getElementById("email").value;
        var id = document.getElementById("bookId").value;
        var unavailableShown = document.getElementById("unavailableShown").value;
        
        $("#textfield").html("Your email has been sent.");
        $("#email").hide();
        $("#sendButton").hide();
        
        emailFindLibrary(email, id, unavailableShown);
        
    {literal}}{/literal}
    
</script>

<div>
    <div style="margin-left:5px;margin-top:10px"><span id="textfield">Please enter email.</span></div>
    <div><form><div><input type="text" id="email" name="email" size="35" value="{$user->email}"/><input type="hidden" id="bookId" name="bookId" value="{$CallNumber}"/><input type="hidden" id="unavailableShown" name="unavailableShown" value="{$unavailableShown}"/></div>
    <div>
    <input type="button" class="button" id="doneButton"  style="background-color:rgb(244,213,56);width:80px;float:right" value="Exit" onclick="hideLightbox()"/>
    <input type="button" class="button" id="sendButton" value="Send" style="width:80px;float:right" onclick="sendEmail()"/>
    </div>
    </form>
    </div>
    
</div>