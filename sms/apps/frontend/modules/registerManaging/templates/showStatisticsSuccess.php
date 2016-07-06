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
<input type="submit" name="submittttt"
	value="<?php echo __("Show statistics");?>"></input></form>
	<?php if(isset($registredDatas)):?>
	<br />
	<div><h2>Register details:</h2>
	<?php echo "Register: $r->name <br />Capacity: $r->capacity <br />Start: $r->start <br />End: $r->end"; ?></div>

<br />
<h2>Number of registred:</h2> <?php echo $count;?>
<br />
<h2>List of them:</h2>
<br />


<div><?php  foreach ($registredDatas as $rd):?> 
<?php if(isset($rd)) echo $rd->getPerson()->getEmail()."<br />";?>

	<?php endforeach;?></div>
	<?php // print_r($registredPersons);?>
	<?php endif;?>
	<br />
	
	
	<?php //print_r($orders)?>