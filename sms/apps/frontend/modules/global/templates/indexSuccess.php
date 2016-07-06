<h1><?php echo __('Inbox')?></h1>
<h2><?php echo __('Unread Messages')?>:</h2>
<table align="center">
	<?php foreach($read as $r):?>
	<tr>
		<th><a href="<?php echo url_for('global/view')?>/<?php echo $r->id?>"><?php echo $r->sender?></a></th>
		<td><?php echo $r->text//substr($r->text, 0, strpos($r->text, ' ', 10)!==false?strpos($r->text, ' ', 10):5)?>...</td>
	</tr>
	<?php endforeach?>
</table>
<h2><?php echo __('Read Messages')?>:</h2>
<table align="center">
	<?php foreach($unread as $r):?>
	<tr>
		<th><a href="<?php echo url_for('global/view')?>/<?php echo $r->id?>"><?php echo $r->sender?></a></th>
		<td><?php echo $r->text///substr($r->text, 0, strpos($s->text, ' ', 10))?>...</td>
	</tr>
	<?php endforeach?>
</table>
	