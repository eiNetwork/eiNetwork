<?php /* Smarty version 2.6.19, created on 2012-06-14 15:33:12
         compiled from Search/Recommend/SideFacets.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Search/Recommend/SideFacets.tpl', 12, false),array('modifier', 'translate', 'Search/Recommend/SideFacets.tpl', 95, false),array('function', 'translate', 'Search/Recommend/SideFacets.tpl', 16, false),)), $this); ?>
<?php if ($this->_tpl_vars['recordCount'] > 0 || $this->_tpl_vars['filterList'] || ( $this->_tpl_vars['sideFacetSet'] && $this->_tpl_vars['recordCount'] > 0 )): ?>
<div class="sidegroup">
		<?php if (isset ( $this->_tpl_vars['checkboxFilters'] ) && count ( $this->_tpl_vars['checkboxFilters'] ) > 0): ?>
	<p>
	<table>
	<?php $_from = $this->_tpl_vars['checkboxFilters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['current']):
?>
		<tr<?php if ($this->_tpl_vars['recordCount'] < 1 && ! $this->_tpl_vars['current']['selected']): ?> style="display: none;"<?php endif; ?>>
		<td style="vertical-align:top; padding: 3px;">
			<input type="checkbox" name="filter[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['current']['filter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
			<?php if ($this->_tpl_vars['current']['selected']): ?>checked="checked"<?php endif; ?>
			onclick="document.location.href='<?php echo ((is_array($_tmp=$this->_tpl_vars['current']['toggleUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';" />
		</td>
		<td><?php echo translate(array('text' => $this->_tpl_vars['current']['desc']), $this);?>
<br /></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
	</p>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['filterList']): ?>
	<strong><?php echo translate(array('text' => 'Remove Filters'), $this);?>
</strong>
	<ul class="filters">
	<?php $_from = $this->_tpl_vars['filterList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['filters']):
?>
		<?php $_from = $this->_tpl_vars['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['filter']):
?>
			<li><?php echo translate(array('text' => $this->_tpl_vars['field']), $this);?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['filter']['display'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['filter']['removalUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
				<img src="<?php echo $this->_tpl_vars['path']; ?>
/images/silk/delete.png" alt="Delete"/>
			</a>
			</li>
		<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['sideFacetSet'] && $this->_tpl_vars['recordCount'] > 0): ?>
		<?php $_from = $this->_tpl_vars['sideFacetSet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['title'] => $this->_tpl_vars['cluster']):
?>
			<?php if ($this->_tpl_vars['title'] == 'publishDate' || $this->_tpl_vars['title'] == 'birthYear' || $this->_tpl_vars['title'] == 'deathYear'): ?>
			
			
			<dl class="narrowList navmenu narrow_begin">
			<dt><?php echo translate(array('text' => $this->_tpl_vars['cluster']['label']), $this);?>
</dt>
			<dd>
			<form name='<?php echo $this->_tpl_vars['title']; ?>
Filter' id='<?php echo $this->_tpl_vars['title']; ?>
Filter' action='<?php echo $this->_tpl_vars['fullPath']; ?>
'>
			<div>
				<label for="<?php echo $this->_tpl_vars['title']; ?>
yearfrom" class='yearboxlabel'>From:</label>
				<input type="text" size="4" maxlength="4" class="yearbox" name="<?php echo $this->_tpl_vars['title']; ?>
yearfrom" id="<?php echo $this->_tpl_vars['title']; ?>
yearfrom" value="" />
				<label for="<?php echo $this->_tpl_vars['title']; ?>
yearto" class='yearboxlabel'>To:</label>
				<input type="text" size="4" maxlength="4" class="yearbox" name="<?php echo $this->_tpl_vars['title']; ?>
yearto" id="<?php echo $this->_tpl_vars['title']; ?>
yearto" value="" />
								
				<?php $_from = $_GET; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['paramName'] => $this->_tpl_vars['parmValue']):
?>
					<?php if (is_array ( $_GET[$this->_tpl_vars['paramName']] )): ?>
						<?php $_from = $_GET[$this->_tpl_vars['paramName']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['parmValue2']):
?>
							
														
							<?php if (strpos ( $this->_tpl_vars['parmValue2'] , $this->_tpl_vars['title'] ) === FALSE): ?>
								<input type="hidden" name="<?php echo $this->_tpl_vars['paramName']; ?>
[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['parmValue2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
						<input type="hidden" name="<?php echo $this->_tpl_vars['paramName']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['parmValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<input type="submit" value="Go" class="goButton" />
				<br/>
				<?php if ($this->_tpl_vars['title'] == 'publishDate'): ?>
					<div id='yearDefaultLinks'>
					<a onclick="$('#<?php echo $this->_tpl_vars['title']; ?>
yearfrom').val('2005');$('#<?php echo $this->_tpl_vars['title']; ?>
yearto').val('');" href='javascript:void(0);'>since&nbsp;2005</a>
					&bull;<a onclick="$('#<?php echo $this->_tpl_vars['title']; ?>
yearfrom').val('2000');$('#<?php echo $this->_tpl_vars['title']; ?>
yearto').val('');" href='javascript:void(0);'>since&nbsp;2000</a>
					&bull;<a onclick="$('#<?php echo $this->_tpl_vars['title']; ?>
yearfrom').val('1995');$('#<?php echo $this->_tpl_vars['title']; ?>
yearto').val('');" href='javascript:void(0);'>since&nbsp;1995</a>
					</div>
				<?php endif; ?>
			</div>
			</form>
			</dd>
			</dl>
			
			
			<?php elseif ($this->_tpl_vars['title'] == 'rating_facet'): ?>
			
			<dl class="narrowList navmenu narrow_begin">
				<dt><?php echo translate(array('text' => $this->_tpl_vars['cluster']['label']), $this);?>
</dt>
				<?php $_from = $this->_tpl_vars['ratingLabels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curLabel']):
?>
					<?php $this->assign('thisFacet', $this->_tpl_vars['cluster']['list'][$this->_tpl_vars['curLabel']]); ?>
					<?php if ($this->_tpl_vars['thisFacet']['isApplied']): ?>
						<?php if ($this->_tpl_vars['curLabel'] == 'Unrated'): ?>
							<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <img src="<?php echo $this->_tpl_vars['path']; ?>
/images/silk/tick.png" alt="Selected" />
							<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['removalUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="removeFacetLink">(remove)</a>
							</dd>
						<?php else: ?>
							<dd><img src="<?php echo $this->_tpl_vars['path']; ?>
/images/<?php echo $this->_tpl_vars['curLabel']; ?>
.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['curLabel'])) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
"/>
								<img src="<?php echo $this->_tpl_vars['path']; ?>
/images/silk/tick.png" alt="Selected" />
								<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['removalUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="removeFacetLink">(remove)</a>
							</dd>
						<?php endif; ?>
					<?php else: ?>
						<?php if ($this->_tpl_vars['curLabel'] == 'Unrated'): ?>
							<dd><?php if ($this->_tpl_vars['thisFacet']['url'] != null): ?>
							<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['display'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php if ($this->_tpl_vars['thisFacet']['url'] != null): ?></a><?php endif; ?> (<?php echo $this->_tpl_vars['thisFacet']['count']; ?>
)
							</dd>
						<?php else: ?>
							<dd><?php if ($this->_tpl_vars['thisFacet']['url'] != null): ?>
							<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php endif; ?><img src="<?php echo $this->_tpl_vars['path']; ?>
/images/<?php echo $this->_tpl_vars['curLabel']; ?>
.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['curLabel'])) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
"/><?php if ($this->_tpl_vars['thisFacet']['url'] != null): ?></a><?php endif; ?> (<?php if ($this->_tpl_vars['thisFacet']['count']): ?><?php echo $this->_tpl_vars['thisFacet']['count']; ?>
<?php else: ?>0<?php endif; ?>)
							</dd>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</dl>
			
			
			<?php elseif ($this->_tpl_vars['title'] == 'lexile_score' || $this->_tpl_vars['title'] == 'accelerated_reader_reading_level' || $this->_tpl_vars['title'] == 'accelerated_reader_point_value'): ?>
			<dl class="narrowList navmenu narrowbegin">
			<dt><?php echo translate(array('text' => $this->_tpl_vars['cluster']['label']), $this);?>
</dt>
			<form id='<?php echo $this->_tpl_vars['title']; ?>
Filter' action='<?php echo $this->_tpl_vars['fullPath']; ?>
'>
				<div>
					<label for="<?php echo $this->_tpl_vars['title']; ?>
from" class='yearboxlabel'>From:</label>
					<input type="text" size="4" maxlength="4" class="yearbox" name="<?php echo $this->_tpl_vars['title']; ?>
from" id="<?php echo $this->_tpl_vars['title']; ?>
from" value="" />
					<label for="<?php echo $this->_tpl_vars['title']; ?>
to" class='yearboxlabel'>To:</label>
					<input type="text" size="4" maxlength="4" class="yearbox" name="<?php echo $this->_tpl_vars['title']; ?>
to" id="<?php echo $this->_tpl_vars['title']; ?>
to" value="" />
										<?php $_from = $_GET; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['paramName'] => $this->_tpl_vars['parmValue']):
?>
						<?php if (is_array ( $_GET[$this->_tpl_vars['paramName']] )): ?>
							<?php $_from = $_GET[$this->_tpl_vars['paramName']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['parmValue2']):
?>
														<?php if (strpos ( $this->_tpl_vars['parmValue2'] , $this->_tpl_vars['title'] ) === FALSE): ?>
							<input type="hidden" name="<?php echo $this->_tpl_vars['paramName']; ?>
[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['parmValue2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
							<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
						<?php else: ?>
							<input type="hidden" name="<?php echo $this->_tpl_vars['paramName']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['parmValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					<input type="submit" value="Go" id="goButton" />
				</div>
			</form>
			</dl>
			<?php else: ?>
			<dl class="narrowList navmenu narrowbegin">
				<dt><?php echo translate(array('text' => $this->_tpl_vars['cluster']['label']), $this);?>
</dt>
				<?php $_from = $this->_tpl_vars['cluster']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['narrowLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['narrowLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['thisFacet']):
        $this->_foreach['narrowLoop']['iteration']++;
?>
					<?php if ($this->_foreach['narrowLoop']['iteration'] == ( $this->_tpl_vars['cluster']['valuesToShow'] + 1 )): ?>
					<dd id="more<?php echo $this->_tpl_vars['title']; ?>
">
						<a href="#" onclick="moreFacets('<?php echo $this->_tpl_vars['title']; ?>
'); return false;"><?php echo translate(array('text' => 'more'), $this);?>
 ...</a>
					</dd>
			</dl>
			<dl class="narrowList navmenu narrowGroupHidden" id="narrowGroupHidden_<?php echo $this->_tpl_vars['title']; ?>
">
			<?php endif; ?>
				<?php if ($this->_tpl_vars['thisFacet']['isApplied']): ?>
				<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['display'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

					<img src="<?php echo $this->_tpl_vars['path']; ?>
/images/silk/tick.png" alt="Selected" />
					<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['removalUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="removeFacetLink">(remove)</a>
				</dd>
				<?php else: ?>
				<dd>
					<?php if ($this->_tpl_vars['thisFacet']['url'] != null): ?>
					<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['display'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php if ($this->_tpl_vars['thisFacet']['url'] != null): ?></a><?php endif; ?>
					<?php if ($this->_tpl_vars['thisFacet']['count'] != ''): ?>(<?php echo $this->_tpl_vars['thisFacet']['count']; ?>
)<?php endif; ?>
				</dd>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<?php if ($this->_foreach['narrowLoop']['total'] > $this->_tpl_vars['cluster']['valuesToShow']): ?>
				<dd>
					<a href="#" onclick="lessFacets('<?php echo $this->_tpl_vars['title']; ?>
'); return false;"><?php echo translate(array('text' => 'less'), $this);?>
 ...</a>
				</dd>
				<?php endif; ?>
			</dl>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
</div>
<?php endif; ?>