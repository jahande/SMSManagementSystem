<?php use_helper('I18n');?>
<form method="POST" action="<?php echo url_for($address); ?>">
<div><?php echo __('Select The poll name that you want:');?> <?php echo __('Poll name:');?>
<select name='pollId'>

<?php  foreach ($polls as $poll):?>
	<option value="<?php echo $poll->getId();?>"><?php echo $poll->getName();?></option>
	<?php endforeach;?>

</select></div>
<br />

<input type="submit" name="submittttt"
	value="<?php echo __("Show statistics");?>"></input></form>
	
	
	<?php if($show):?>
	<h1><?php echo __('Poll Results')?></h1>

<h2><?php echo __('Poll Details')?></h2>
<?php include_partial('global/detailTable', array('details'=>$details))?>

<h2><?php echo __('Poll Results')?></h2>
<?php include_partial('global/detailTable', array('details'=>$choiceDetails))?>
<div class="Center">
<?php 
$x = array();
$x['a'] = 4;
$x['b'] = 6;
?>
	<?php include_partial('global/chart',
			array('type'=>'bar', 'data'=>$x, 'id'=>'rChart', 'title'=>'Results',
				'axisX'=>'Choices', 'axisY'=>'N'));?>
</div>
	<?php endif;?>
	
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

<?php if(false && $show):?>
<?php
	if (!isset($axisX)) $axisX="X";
	if (!isset($axisY)) $axisY="Y";
?>

<div id="<?php echo $id?>"></div>
<script type="text/javascript">
	<?php $a = array(); foreach ($data as $k=>$v){ $a[] = "['$k', $v]";}?>
	<?php $b = array(); foreach ($data as $k=>$v){ $b[] = "['$k', '$k']";}?>
	var myData = new Array(<?php echo implode(',', $a)?>);
	var myChart = new JSChart('rChart', 'bar');
	myChart.setDataArray(myData);

	myChart.setTitle('<?php echo __($title)?>');
	myChart.setAxisNameX('<?php echo __($axisX)?>');
	myChart.setAxisNameY('<?php echo __($axisY)?>');
	
	myChart.setGraphExtend(true);
	myChart.setGrid(false);

	myChart.setLabelX([<?php echo implode(',', $b)?>]);
	myChart.setShowYValues(false);
			
			
	myChart.draw();
</script>
<?php endif;?>
