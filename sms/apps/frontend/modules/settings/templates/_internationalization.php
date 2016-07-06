<div>
<?php //echo $c." ".$foo." ".$tags[0]->name;?>
<div><h3>Site's tags frequency</h3></div>
<div class="layoutTagsShower-content">
<?php foreach ($tagsFrequent as $tagName => $frequency) :?>
<div >
<?php
$href = url_for(array( 'module'=>'view', 'action'=>'showTag', 'tag_name'=>$tagName));

// echo link_to($tagName,'view/tags?'.$tagName)."->".$frequency;
?>

<a href="<?php echo $href;?>"> <?php echo $tagName;?></a> : in <?php echo $frequency;?> post<?php if($frequency>1){echo 's';}?>
</div>
<?php endforeach;?>
</div>
</div>
