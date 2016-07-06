<h2><?php echo __("New Contest")?></h2>
<?php echo form_tag('contest/new')?>
<table>
	<?php echo $form; ?>
	<tr>
		<th><?php echo __("Winners Notice SMS")?></th>
		<td><textarea cols="20" rows="5" name="winNotice"></textarea></td>
	</tr>
	<tr>
		<th><?php echo __('Choices') ?></th>
		<td>
			
			<div id="choiceList"></div>
			<input type="text" id="newChoice"/>
			<input type="button" id="addChoice" value="+" onclick="performAddChoice()" /><br/>
		</td>
	</tr>
	<tr>
		<th><?php echo __('Participants')?></th>
		<td><?php include_partial('global/groupMultiSelect', array('name'=>'participantGroups[]'))?></td>
	</tr>
	<tr>
		<td colspan="2" class="Center"><input type="submit" value="<?php echo __('submit')?>"/></td>
	</tr>
</table>
</form>

<script type="text/javascript">
	function performAddChoice(){
		var name = $('#newChoice').attr('value');
		$('#choiceList').append('<input type="radio" name="answer" value="'+name+'">'+name+'</input><br/>');
		$('#choiceList').append('<input type="hidden" name="choice[]" value="'+name+'" />');
	}
</script>
