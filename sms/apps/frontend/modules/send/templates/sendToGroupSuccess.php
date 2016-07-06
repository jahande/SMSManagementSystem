<h1><?php echo __('Send Message')?></h1>
<form method="post">
	<table>
    <tfoot>
    	<tr><td colspan="2" class="Center"><input type="submit" value="<?php echo __('Send')?>" /></td></tr>
    </tfoot>
    <tbody>
    	<tr>
    		<th><label for=""><?php echo __('To')?>:</label></th>
    		<td><?php include_partial("global/groupMultiSelect", array('name'=>'send[groups][]'))?></td>
    	</tr>
    	<tr>
    		<th><label for=""><?php echo __('Message')?></label></th>
    		<td><textarea name="send[message]" cols="20" rows="8"></textarea></td>
    	</tr>
    	<tr>
    		<th><label for=""><?php echo __('Email')?>?</label></th>
    		<td><input type="checkbox" name="send[email]"/></td>
    	</tr>
    	<tr>
    		<th><label for=""><?php echo __('Send Later')?>?</label></th>
    		<td><input type="checkbox" onclick="$('#sendTimeRow').fadeToggle('slow');" name="send[later]"/></td>
    	</tr>
    	<tr id="sendTimeRow" style="display:none;">
    		<th><label for=""><?php echo __('Send At')?>:</label></th>
    		<td><input type="text" name="send[time]"/></td>
    	</tr>
    </tbody>
	</table>
</form>