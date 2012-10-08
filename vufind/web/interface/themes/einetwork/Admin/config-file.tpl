<div id="page-content" class="content">
  <div id="left-bar">
    {include file="Admin/menu.tpl"}
  </div>
  
  <div id="main-content">
          <h1>{$pageTitle}</h1>
          
          {include file="Admin/savestatus.tpl"}
          
          <p>
            You are viewing the file at {$configPath}.
          </p>

          <form method="post">
            <textarea name="config_file" rows="20" cols="70" class="configEditor">{$configFile|escape}</textarea><br />
            <input type="submit" name="submit" value="Save">
          </form>
  </div>
  <div id="right-bar">
    {include file="MyResearch/menu.tpl"}
  </div>
</div>