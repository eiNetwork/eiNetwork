<div id="page-content" class="content">
  <div id="left-bar">
   {include file="Admin/menu.tpl"}
  </div>
  <div id="main-content">
          <h1>Synonyms Configuration</h1>
          {include file="Admin/savestatus.tpl"}

          <p>
            Synonyms are words that have the same meaning.<br />
            <br />
            Mappings work by either assignment or grouping.<br />
            Assignment works just like a translation, for example:<br />
          <pre>
            colour => color
          </pre>
          <br />
            Grouping allows each term to have a match on any other term in the group, for example:<br />
          <pre>
            GB,gib,gigabyte,gigabytes
            MB,mib,megabyte,megabytes
            Television, Televisions, TV, TVs
          </pre>
          </p>

          <form method="post">
            <textarea name="synonyms" rows="20" cols="20">{$synonyms|escape}</textarea><br />
            <input type="submit" name="submit" value="Save">
          </form>

  </div>
  
    <div id="right-bar">
    {include file="MyResearch/menu.tpl"}
  </div>
</div>