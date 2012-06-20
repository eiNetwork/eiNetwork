<?php /* Smarty version 2.6.19, created on 2012-06-18 14:05:57
         compiled from Record/view-syndetics-fiction.tpl */ ?>
<div class='fictionProfile'>
<div class='fictionProfileTitle'>Characters</div>
<?php $_from = $this->_tpl_vars['fictionData']['characters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['character']):
?>
<div class='fictionCharacter'>
<span class='fictionCharacterName'><?php echo $this->_tpl_vars['character']['name']; ?>
</span>
<span class='fictionCharacterGender'><?php echo $this->_tpl_vars['character']['gender']; ?>
</span>
<span class='fictionCharacterAge'><?php echo $this->_tpl_vars['character']['age']; ?>
</span>
<div class='fictionCharacterOccupation'><?php echo $this->_tpl_vars['character']['occupation']; ?>
</div>
<div class='fictionCharacterDescription'><?php echo $this->_tpl_vars['character']['description']; ?>
</div>
</div>
<?php endforeach; endif; unset($_from); ?>

<?php if (isset ( $this->_tpl_vars['fictionData']['topics'] )): ?>
<div class='fictionProfileTitle'>Topics</div>
<div class='fictionTopics'>
<?php $_from = $this->_tpl_vars['fictionData']['topics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['topic']):
?>
<span class='fictionTopic'><?php echo $this->_tpl_vars['topic']; ?>
, </span>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['fictionData']['settings'] )): ?>
<div class='fictionProfileTitle'>Settings</div>
<div class='fictionSettings'>
<?php $_from = $this->_tpl_vars['fictionData']['settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['setting']):
?>
<span class='fictionSetting'><?php echo $this->_tpl_vars['setting']; ?>
, </span>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['fictionData']['settings'] )): ?>
<div class='fictionProfileTitle'>Genres</div>
<div class='fictionGenres'>
<?php $_from = $this->_tpl_vars['fictionData']['genres']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['genre']):
?>
<div class='fictionGenre'><?php echo $this->_tpl_vars['genre']['name']; ?>

	<?php $_from = $this->_tpl_vars['genre']['subGenres']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subGenre']):
?>
	<div class='fictionSubgenre'>--<?php echo $this->_tpl_vars['subGenre']; ?>
</div>
	<?php endforeach; endif; unset($_from); ?>
</div>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<div class='fictionProfileTitle'>Awards</div>
<?php $_from = $this->_tpl_vars['fictionData']['awards']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['award']):
?>
<div class='fictionAward'>
<span class='fictionAwardYear'><?php echo $this->_tpl_vars['award']['year']; ?>
</span>
<span class='fictionAwardName'><?php echo $this->_tpl_vars['award']['name']; ?>
</span>
</div>
<?php endforeach; endif; unset($_from); ?>

</div>