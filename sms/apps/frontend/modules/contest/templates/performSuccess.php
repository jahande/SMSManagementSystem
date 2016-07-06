<h1><?php echo __('Contest Performed')?></h1>
<h2><?php echo __('Winners List')?></h2>
<ul>
	<?php foreach ($winners as $winner):?>
	<li><?php echo $winner?></li>
	<?php endforeach?>
</ul>
<?php if (isset($warning)):?>
<div class="Warning"><?php echo __($warning)?></div>
<?php endif?>