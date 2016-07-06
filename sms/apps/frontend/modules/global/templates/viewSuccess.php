<h1><?php echo __('Viewing SMS')?></h1>
<hr/>
<h2><?php echo __('From').': '.($sms->sender)?></h2>
<h2><?php echo __('Sent').': '.($sms->created_at)?></h2>
<hr/>
<p><?php echo $sms->text?></p>