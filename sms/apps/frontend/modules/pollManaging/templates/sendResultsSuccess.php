<?php use_helper('I18n');?>
<form method="POST" action="<?php echo url_for($address); ?>">
<div><?php echo __('Select The poll name that you want:');?> <?php echo __('Poll name:');?>
<select name='pollId'>

<?php  foreach ($polls as $poll):?>
	<option value="<?php echo $poll->getId();?>"><?php echo $poll->getName();?></option>
	<?php endforeach;?>

</select></div>
<br />

<input type="submit" name="submittttt"
	value="<?php echo __("Send results");?>"></input></form>
	
	
