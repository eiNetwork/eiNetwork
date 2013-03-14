
<script>
    
    function editEmail(){literal}{{/literal}
        
        var email = document.getElementById("email").value;
        var overDriveId = document.getElementById("overDriveId").value;
        
        $("#textfield").html("Your email has been updated.");
        $("#email").hide();
        $("#editButton").hide();
        
        editOverDriveEmail(email, overDriveId);
        
    {literal}}{/literal}
    
</script>

<div>
    <div style="margin-left:5px;margin-top:10px"><span id="textfield">Please enter email for holds notification.</span></div>
    <div><form><div><input type="text" id="email" name="email" size="35" value="{$user->email}"/><input type="hidden" id="overDriveId" name="overDriveId" value="{$overDriveId}"/>
    <div>
    <input type="button" class="button" id="doneButton"  style="background-color:rgb(244,213,56);width:80px;float:right" value="Exit" onclick="hideLightbox()"/>
    <input type="button" class="button" id="editButton" value="Update" style="width:80px;float:right" onclick="editEmail()"/>
    </div>
    </form>
    </div>
    
</div>