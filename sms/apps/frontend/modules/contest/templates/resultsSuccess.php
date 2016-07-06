<h1><?php echo __('Contest Results')?></h1>

<h2><?php echo __('Contest Details')?></h2>
<?php include_partial('global/detailTable', array('details'=>$details))?>

<h2><?php echo __('Contest Results')?></h2>
<?php include_partial('global/detailTable', array('details'=>$choiceDetails))?>
<div class="Center">
<?php 
$x = array();
$x['a'] = 4;
$x['b'] = 6;
?>
	<?php include_partial('global/chart',
			array('type'=>'bar', 'data'=>$data, 'id'=>'rChart', 'title'=>'Results',
				'axisX'=>'Choices', 'axisY'=>'N'))?>
</div>