<script type="text/javascript" src="{$path}/js/validate/jquery.validate.min.js" ></script>
{* Errors *}
{if isset($errors) && count($errors) > 0}
  <div id='errors'>
  {foreach from=$errors item=error}
    <div id='error'>{$error}</div>
  {/foreach}
  </div>
{/if}

{* Create the base form *}
<form id='objectEditor' method="post" enctype="multipart/form-data" action="{$submitUrl}">
  {literal}
  <script type="text/javascript">
  $(document).ready(function(){
    $("#objectEditor").validate();
  });
  </script>
  {/literal}
  
  <div class='editor'>
    <input type='hidden' name='objectAction' value='save' />
    <input type='hidden' name='id' value='{$id}' />
    
    {foreach from=$structure item=property}
      {assign var=propName value=$property.property}
      {assign var=propValue value=$object->$propName}
      {if ((!isset($property.storeDb) || $property.storeDb == true) && !($property.type == 'label' || $property.type == 'oneToManyAssociation' || $property.type == 'hidden' || $property.type == 'method'))}
        <div class='propertyInput' id="propertyRow{$propName}">
	        {* Output the label *}
	        <label for='{$propName}' class='objectLabel'>{$property.label}</label>
          
	        {* Output the editing control*}
	        {if $property.type == 'text' || $property.type == 'folder' || $property.type == 'integer'}
	          <br/>
	          <input type='{$property.type}' name='{$propName}' id='{$propName}' value='{$propValue|escape}' {if $property.maxLength}maxlength='{$property.maxLength}'{/if} {if $property.size}size='{$property.size}'{/if} title='{$property.description}' class='{if $property.required}required{/if}'/>
	        
	        {elseif $property.type == 'url'}
	          <br/>
	          <input type='text' name='{$propName}' id='{$propName}' value='{$propValue|escape}' {if $property.maxLength}maxlength='{$property.maxLength}'{/if} {if $property.size}size='{$property.size}'{/if} title='{$property.description}' class='url {if $property.required}required{/if}' />
      
	        {elseif $property.type == 'date'}
	          <input type='{$property.type}' name='{$propName}' id='{$propName}' value='{$propValue}' {if $property.maxLength}maxLength='10'{/if}  class='{if $property.required}required{/if} date'/>
	        
	        {elseif $property.type == 'partialDate'}
	          {assign var=propNameMonth value=$property.propNameMonth}
	          {assign var=propNameDay value=$property.propNameDay}
	          {assign var=propNameYear value=$property.propNameYear}
	          Month: <select name='{$propNameMonth}' id='{$propNameMonth}' >
	            <option value=""></option>
	            <option value="1" {if $object->$propNameMonth == '1'}selected='selected'{/if}>January</option>
	            <option value="2" {if $object->$propNameMonth == '2'}selected='selected'{/if}>February</option>
	            <option value="3" {if $object->$propNameMonth == '3'}selected='selected'{/if}>March</option>
	            <option value="4" {if $object->$propNameMonth == '4'}selected='selected'{/if}>April</option>
	            <option value="5" {if $object->$propNameMonth == '5'}selected='selected'{/if}>May</option>
	            <option value="6" {if $object->$propNameMonth == '6'}selected='selected'{/if}>June</option>
	            <option value="7" {if $object->$propNameMonth == '7'}selected='selected'{/if}>July</option>
	            <option value="8" {if $object->$propNameMonth == '8'}selected='selected'{/if}>August</option>
	            <option value="9" {if $object->$propNameMonth == '9'}selected='selected'{/if}>September</option>
	            <option value="10" {if $object->$propNameMonth == '10'}selected='selected'{/if}>October</option>
	            <option value="11" {if $object->$propNameMonth == '11'}selected='selected'{/if}>November</option>
	            <option value="12" {if $object->$propNameMonth == '12'}selected='selected'{/if}>December</option>
	            </select>
	          Day: <input type='text' name='{$propNameDay}' id='{$propNameDay}' value='{$object->$propNameDay}' maxLength='2' size='2'/>
	          Year: <input type='text' name='{$propNameYear}' id='{$propNameYear}' value='{$object->$propNameYear}' maxLength='4' size='4'/>
	        
	        {elseif $property.type == 'textarea' || $property.type == 'html' || $property.type == 'crSeparated'}
	          <br/><textarea name='{$propName}' id='{$propName}' rows='{$property.rows}' cols='{$property.cols}' title='{$property.description}' class='{if $property.required}required{/if}'>{$propValue|escape}</textarea>
	          {if $property.type == 'html'}
              <script type="text/javascript">
							{literal}
							CKEDITOR.replace( '{/literal}{$propName}{literal}',
							    {
							          toolbar : 'Basic'
							    });
							{/literal}
							</script>
            {/if}
            
	        {elseif $property.type == 'password'}
	          <input type='password' name='{$propName}' id='{$propName}'/>
	          Repeat the Password:
	          <input type='password' name='{$propName}Repeat' />
	        
	        {elseif $property.type == 'currency'}
	          {assign var=propDisplayFormat value=$property.displayFormat}
	          <input type='text' name='{$propName}' id='{$propName}' value='{$propValue|string_format:$propDisplayFormat}'></input>
	        
	        {elseif $property.type == 'label'}
	          <div id='{$propName}'>{$propValue}</div>
	          
	        {elseif $property.type == 'html'}
            {include file="DataObjectUtil/htmlField.tpl"}
	        
	        {elseif $property.type == 'enum'}
	          <select name='{$propName}' id='{$propName}Select'>
	          {foreach from=$property.values item=propertyName key=propertyValue}
	            <option value='{$propertyValue}' {if $propValue == $propertyValue}selected='selected'{/if}>{$propertyName}</option>
	          {/foreach}
	          </select>
	        
	        {elseif $property.type == 'multiSelect'}
	          {if isset($property.listStyle) && $property.listStyle == 'checkbox'}
	            {foreach from=$property.values item=propertyName key=propertyValue}
	              <br /><input name='{$propName}[{$propertyValue}]' type="checkbox" value='{$propertyValue}' {if is_array($propValue) && in_array($propertyValue, array_keys($propValue))}checked='checked'{/if}>{$propertyName}</input>
	            {/foreach}
	          {else}
	            <br />
	            <select name='{$propName}' id='{$propName}' multiple="multiple">
	            {foreach from=$property.values item=propertyName key=propertyValue}
	              <option value='{$propertyValue}' {if $propValue == $propertyValue}selected='selected'{/if}>{$propertyName}</option>
	            {/foreach}
	            </select>
	          {/if}
	        
	        {elseif $property.type == 'image' || $property.type == 'file'}
	          <br />
	          {if $propValue}
	          	{if $property.type == 'image'}
		            <img src='{$path}/files/thumbnail/{$propValue}'/>{$propValue}
		            <input type='checkbox' name='remove{$propName}' id='remove{$propName}' /> Remove image.
		            <br/>
		          {else}
		          	Existing file: {$propValue}
		          	<input type='hidden' name='{$propName}_existing' id='{$propName}_existing' value='{$propValue|escape}' /> 
		          	
		          {/if}
	          {/if}
	          {* Display a table of the association with the ability to add and edit new values *}
	          <input type="file" name='{$propName}' id='{$propName}' size="80"/>
	              
	        {elseif $property.type == 'checkbox'}
	          <input type='{$property.type}' name='{$propName}' id='{$propName}' {if ($propValue == 1)}checked='checked'{/if}/>
	          
	        {elseif $property.type == 'oneToMany'}
	        	{include file="DataObjectUtil/oneToMany.tpl"}
	        {elseif $property.type == 'section'}
	        		
	        		
	        		
	        		
	        		
	        		
	        		
	        		<div style="margin-left:10px;">
	        		
	        		
	        		
	        		            {foreach from=$property.properties item=property1}
      {assign var=propName1 value=$property1.property}
      {assign var=propValue1 value=$object->$propName1}
      {if ((!isset($property1.storeDb) || $property1.storeDb == true) && !($property1.type == 'label' || $property1.type == 'oneToManyAssociation' || $property1.type == 'hidden' || $property1.type == 'method'))}
        <div class='property1Input' id="property1Row{$propName1}">
	        {* Output the label *}
	        <label for='{$propName1}' class='objectLabel'>{$property1.label}</label>
          
	        {* Output the editing control*}
	        {if $property1.type == 'text' || $property1.type == 'folder' || $property1.type == 'integer'}
	          <br/>
	          <input type='{$property1.type}' name='{$propName1}' id='{$propName1}' value='{$propValue1|escape}' {if $property1.maxLength}maxlength='{$property1.maxLength}'{/if} {if $property1.size}size='{$property1.size}'{/if} title='{$property1.description}' class='{if $property1.required}required{/if}'/>
	        
	        {elseif $property1.type == 'url'}
	          <br/>
	          <input type='text' name='{$propName1}' id='{$propName1}' value='{$propValue1|escape}' {if $property1.maxLength}maxlength='{$property1.maxLength}'{/if} {if $property1.size}size='{$property1.size}'{/if} title='{$property1.description}' class='url {if $property1.required}required{/if}' />
      
	        {elseif $property1.type == 'date'}
	          <input type='{$property1.type}' name='{$propName1}' id='{$propName1}' value='{$propValue1}' {if $property1.maxLength}maxLength='10'{/if}  class='{if $property1.required}required{/if} date'/>
	        
	        {elseif $property1.type == 'partialDate'}
	          {assign var=propName1Month value=$property1.propName1Month}
	          {assign var=propName1Day value=$property1.propName1Day}
	          {assign var=propName1Year value=$property1.propName1Year}
	          Month: <select name='{$propName1Month}' id='{$propName1Month}' >
	            <option value=""></option>
	            <option value="1" {if $object->$propName1Month == '1'}selected='selected'{/if}>January</option>
	            <option value="2" {if $object->$propName1Month == '2'}selected='selected'{/if}>February</option>
	            <option value="3" {if $object->$propName1Month == '3'}selected='selected'{/if}>March</option>
	            <option value="4" {if $object->$propName1Month == '4'}selected='selected'{/if}>April</option>
	            <option value="5" {if $object->$propName1Month == '5'}selected='selected'{/if}>May</option>
	            <option value="6" {if $object->$propName1Month == '6'}selected='selected'{/if}>June</option>
	            <option value="7" {if $object->$propName1Month == '7'}selected='selected'{/if}>July</option>
	            <option value="8" {if $object->$propName1Month == '8'}selected='selected'{/if}>August</option>
	            <option value="9" {if $object->$propName1Month == '9'}selected='selected'{/if}>September</option>
	            <option value="10" {if $object->$propName1Month == '10'}selected='selected'{/if}>October</option>
	            <option value="11" {if $object->$propName1Month == '11'}selected='selected'{/if}>November</option>
	            <option value="12" {if $object->$propName1Month == '12'}selected='selected'{/if}>December</option>
	            </select>
	          Day: <input type='text' name='{$propName1Day}' id='{$propName1Day}' value='{$object->$propName1Day}' maxLength='2' size='2'/>
	          Year: <input type='text' name='{$propName1Year}' id='{$propName1Year}' value='{$object->$propName1Year}' maxLength='4' size='4'/>
	        
	        {elseif $property1.type == 'textarea' || $property1.type == 'html' || $property1.type == 'crSeparated'}
	          <br/><textarea name='{$propName1}' id='{$propName1}' rows='{$property1.rows}' cols='{$property1.cols}' title='{$property1.description}' class='{if $property1.required}required{/if}'>{$propValue1|escape}</textarea>
	          {if $property1.type == 'html'}
              <script type="text/javascript">
							{literal}
							CKEDITOR.replace( '{/literal}{$propName1}{literal}',
							    {
							          toolbar : 'Basic'
							    });
							{/literal}
							</script>
            {/if}
            
	        {elseif $property1.type == 'password'}
	          <input type='password' name='{$propName1}' id='{$propName1}'/>
	          Repeat the Password:
	          <input type='password' name='{$propName1}Repeat' />
	        
	        {elseif $property1.type == 'currency'}
	          {assign var=propDisplayFormat value=$property1.displayFormat}
	          <input type='text' name='{$propName1}' id='{$propName1}' value='{$propValue1|string_format:$propDisplayFormat}'></input>
	        
	        {elseif $property1.type == 'label'}
	          <div id='{$propName1}'>{$propValue1}</div>
	          
	        {elseif $property1.type == 'html'}
            {include file="DataObjectUtil/htmlField.tpl"}
	        
	        {elseif $property1.type == 'enum'}
	          <select name='{$propName1}' id='{$propName1}Select'>
	          {foreach from=$property1.values item=property1Name key=property1Value}
	            <option value='{$property1Value}' {if $propValue1 == $property1Value}selected='selected'{/if}>{$property1Name}</option>
	          {/foreach}
	          </select>
	        
	        {elseif $property1.type == 'multiSelect'}
	          {if isset($property1.listStyle) && $property1.listStyle == 'checkbox'}
	            {foreach from=$property1.values item=property1Name key=property1Value}
	              <br /><input name='{$propName1}[{$property1Value}]' type="checkbox" value='{$property1Value}' {if is_array($propValue1) && in_array($property1Value, array_keys($propValue1))}checked='checked'{/if}>{$property1Name}</input>
	            {/foreach}
	          {else}
	            <br />
	            <select name='{$propName1}' id='{$propName1}' multiple="multiple">
	            {foreach from=$property1.values item=property1Name key=property1Value}
	              <option value='{$property1Value}' {if $propValue1 == $property1Value}selected='selected'{/if}>{$property1Name}</option>
	            {/foreach}
	            </select>
	          {/if}
	        
	        {elseif $property1.type == 'image' || $property1.type == 'file'}
	          <br />
	          {if $propValue1}
	          	{if $property1.type == 'image'}
		            <img src='{$path}/files/thumbnail/{$propValue1}'/>{$propValue1}
		            <input type='checkbox' name='remove{$propName1}' id='remove{$propName1}' /> Remove image.
		            <br/>
		          {else}
		          	Existing file: {$propValue1}
		          	<input type='hidden' name='{$propName1}_existing' id='{$propName1}_existing' value='{$propValue1|escape}' /> 
		          	
		          {/if}
	          {/if}
	          {* Display a table of the association with the ability to add and edit new values *}
	          <input type="file" name='{$propName1}' id='{$propName1}' size="80"/>
	              
	        {elseif $property1.type == 'checkbox'}
	          <input type='{$property1.type}' name='{$propName1}' id='{$propName1}' {if ($propValue1 == 1)}checked='checked'{/if}/>
	          
	        {elseif $property1.type == 'oneToMany'}
	        	{include file="DataObjectUtil/oneToMany.tpl"}
	        {/if}
	        
		    </div>
	    {elseif $property1.type == 'hidden'}  
	      <input type='hidden' name='{$propName1}' value='{$propValue1}' />
	    {/if}
	    {if $property1.showDescription}
	    	<div class='property1Description'>{$property1.description}</div>
	    {/if}
    {/foreach}
	        		
	        		
	        		
	        		
	        		
	        		
	        		
	        		
	        		</div>
	        		
	        		
	        		
	        		
	        		
	        		
	        {/if}
	        
		    </div>
	    {elseif $property.type == 'hidden'}  
	      <input type='hidden' name='{$propName}' value='{$propValue}' />
	    {/if}
	    {if $property.showDescription}
	    	<div class='propertyDescription'>{$property.description}</div>
	    {/if}
    {/foreach}
    <input type="submit" name="submit" value="Save Changes"/>
  </div>          
</form>