<h1><?php echo __('Send Message')?></h1>
<form method="post">
	<table>
    <tfoot>
    	<tr><td colspan="2" class="Center"><input type="submit" value="<?php echo __('Send')?>" /></td></tr>
    </tfoot>
    <tbody>
    	<tr>
    		<th><label for="send[phones]"><?php echo __('To')?>:</label></th>
    		<td><input type="text" name="send[phones]" /></td>
    	</tr>
    	<tr>
    		<th><label for="send[message]"><?php echo __('Message')?></label></th>
    		<td><textarea name="send[message]" cols="20" rows="8"></textarea></td>
    	</tr>
    </tbody>
	</table>
</form>