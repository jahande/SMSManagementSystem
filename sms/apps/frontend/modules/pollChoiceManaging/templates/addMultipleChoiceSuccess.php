<form method="POST" action="<?php echo url_for($address); ?>" >
<div >
<?php echo __('Select The poll that you want:');?>
<?php echo __('Poll name:');?>
<select name='pollId'>

<?php  foreach ($polls as $poll):?>
	<option value="<?php echo $poll->getId();?>"><?php echo $poll->getName();?></option>
	<?php endforeach;?>

</select></div>
<!-- <div>
<select multiple="multiple" size="4" name="pollsIdToAdd">
	<?php // foreach ($polls as $poll):?>
	<option value="<?php //echo $poll->getId();?>"><?php //echo $poll->getName();?></option>
	<?php //endforeach ?>
</select>
</div> -->
<div>
<?php echo __('Write the choices that you want to add with comma seperated:');?>
<input type="text" name ="choice"></input>
</div>
</form>