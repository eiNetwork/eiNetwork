<script type="text/javascript" src="{$path}/js/validate/jquery.validate.js" ></script>
<script type="text/javascript" src="{$url}/ckeditor/ckeditor.js"></script>
<div id="page-content" class="content">
  <div id="left-bar">
    {include file="Admin/menu.tpl"}
  </div>
  
  <div id="main-content">
    <h1>{if $isNew}Add an Editorial Review{else}Edit an Editorial Review{/if}</h1>
    {$editForm}
  </div>
  <div id="right-bar">
    {include file="MyResearch/menu.tpl"}
  </div>
</div>