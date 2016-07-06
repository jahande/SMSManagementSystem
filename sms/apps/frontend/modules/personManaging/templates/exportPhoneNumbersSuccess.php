<?php use_helper('JavascriptBase');?>
<div>Click button to export the phone numbers.</div>

<form action='<?php echo url_for($address);?>' method=post>

<div align="center"><?php echo __('Group name:');?><select name='groupId'>
	<!-- <option value="-1">تشخیص  خودکار</option> -->

<?php  foreach ($groups as $group):?>
<?php // $group= $groups[0];?>
	<option value="<?php echo $group->getId();?>"><?php echo $group->getName();?></option>
	<?php endforeach;?>
	<option value="-1"><?php echo __('All groups');?></option>

</select></div>
<table border='0' cellspacing='0' cellpadding='0' align=center>



	<tr>
		<td bgcolor='#f1f1f1' colspan='2' align='center'><input type='submit'
			value='<?php echo __('Export');?>'></td>
	</tr>

</table>
</form>
	<?php
	if(isset($phoneNumbersString) && $phoneNumbersString!=''){
		echo javascript_tag('alert(escape("'.$phoneNumbersString.'"));');
	}
//	else{
//		echo javascript_tag("alert('there is no person in this group!');");
//	}
	?>
<?php //RJUtils::startDownload('testFile.txt');?>
<textarea rows="10" cols="50">
<?php  echo $phoneNumbersString;?>
</textarea>