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
