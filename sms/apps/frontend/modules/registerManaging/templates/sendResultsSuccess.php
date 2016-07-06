<?php use_helper('I18n');?>
<form method="POST" action="<?php echo url_for($address); ?>">
<div><?php echo __('Select The registration name that you want:');?> <?php echo __('Registration name:');?>
<select name='registerId'>

<?php  foreach ($registers as $register):?>
	<option value="<?php echo $register->getId();?>"><?php echo $register->getName();?></option>
	<?php endforeach;?>

</select></div>
<br />
<?php if($showCheckBox):?>
<input type="checkbox" name="doRandom" value="true" /> <?php echo __('Delete to reach below capacity');?><br />
<?php endif;?>
<input type="button" name="submit"
	value="<?php echo __("Show statistics");?>"></input></form>
	<?php if(isset($registredPersons)):?>
<div><?php  foreach ($registredPersons as $rp):?> <?php echo $register->getName();?>
<br />
	<?php endforeach;?></div>
	<?php endif;?>