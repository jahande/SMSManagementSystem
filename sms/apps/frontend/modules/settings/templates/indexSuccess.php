<?php use_helper('I18N') ;?>
<br />
<br />
<br />

<form action='<?php echo url_for($address);?>' method=post>

<div align="center"><?php echo __('Language'); ?>:<select name='language'>
	<!-- <option value="-1">تشخیص  خودکار</option> -->

	<option value="fa">فارسی</option>
	<option value="en">english</option>

</select>
<br />
<input  type='submit' value='<?php echo __('Apply settings');?>'>
</div>
</form>