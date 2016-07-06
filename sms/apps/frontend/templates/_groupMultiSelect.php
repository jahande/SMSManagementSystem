<?php
	$groups = Doctrine::getTable('Group')->findAll(); 
?>
<select multiple="multiple" size="4" name="<?php echo $name?>">
	<?php foreach ($groups as $g):?>
	<option value="<?php echo $g->id?>"><?php echo $g->name?></option>
	<?php endforeach ?>
</select>