<?php use_helper('I18N');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php __('SMS Organaize System');?></title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<link rel="shortcut icon" href="/favicon.ico" />
<?php include_stylesheets() ?>
<?php include_javascripts() ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php if (rand(0, 1000)<10) Schedule::check()?>
<div id="wrap">
<div class="header"><!-- TITLE -->
<h1><a href="#"><?php echo __('SMS Organaize System'); ?></a></h1>
<!-- END TITLE --></div>
<div id="nav">
<ul>
	<!-- MENU -->
	<li class="selected"><a href="/"><span><?php echo __('Home');?></span></a></li>
	<li ><?php echo link_to(__('Sent Massage Managing'),'sentManaging/index');?></li>
	<li><?php echo link_to(__('Responder Managing'),'respondManaging/index');?></li>
	<li><?php echo link_to(__('Settings'),'settings/index');?></li>
	<li><?php echo link_to(__('Virtual sender'),'router/virtualSender');?></li>
	<li><?php echo link_to(__('Contact'),'contact/index');?></li>
	<!-- END MENU -->
</ul>
</div>
<div class="page">
<div class="content"><?php echo $sf_content ?></div>

<div class="sidebar"><!-- SIDEBAR -->


<div class="title">
<h4><?php echo __('Phone book');?></h4>
</div>
<ul>
	<li><?php echo link_to(__('Person Managing'),'personManaging/index');?>
	</li>
	<li><?php echo link_to(__('Groups Managing'),'groupsManaging/index');?>
	</li>


</ul>
<div class="title">
<h4><?php echo __('Contest');?></h4>
</div>
<ul>
	<li><?php echo link_to(__('New Contest'),'contest/index');?></li>
	<li><?php echo link_to(__('Contest Results'),'contest/results');?></li>
	<li><?php echo link_to(__('Perform Contest'),'contest/perform');?></li>
	<li><?php echo link_to(__('Search Contest'),'contest/search');?></li>
</ul>

<div class="title">
<h4><?php echo __('Poll');?></h4>
</div>
<ul>
	<li><?php echo link_to(__('Poll Managing'),'pollManaging/index');?></li>
	<li><?php echo link_to(__('Poll Data Managing'),'pollDataManaging/index');?>
	</li>
	<li><?php echo link_to(__('Poll Choice Managing'),'pollChoiceManaging/index');?>
	</li>
	<li><?php echo link_to(__('Show polls statistics'),'pollManaging/ShowStatistics');?>
	</li>
	<li><?php echo link_to(__('Send polls results'),'pollManaging/sendResults');?>
	</li>
	<li><?php echo link_to(__('Add Poll Choice'),'pollChoiceManaging/AddMultipleChoice');?>
	</li>

</ul>
<div class="title">
<h4><?php echo __('Election');?></h4>
</div>
<ul>

	<li><?php echo link_to(__('Election Managing'),'pollManaging/index');?>
	</li>
	<li><?php echo link_to(__('Election Data Managing'),'pollDataManaging/index');?>
	</li>
	<li><?php echo link_to(__('Election Choice Managing'),'pollChoiceManaging/index');?>
	</li>

</ul>
<div class="title">
<h4><?php echo __('Registration');?></h4>
</div>
<ul>
	<li><?php echo link_to(__('Register Managing'),'registerManaging/index');?>
	</li>
	<li><?php echo link_to(__('Register Data Managing'),'registerDataManaging/index');?>
	</li>
	<li><?php echo link_to(__('Show registers statistics'),'registerManaging/ShowStatistics');?>
	</li>

</ul>
<div class="title">
<h4><?php echo __("Others recieved SMS's");?></h4>
</div>
<ul>
	<li><?php echo link_to(__("Show others SMS's"),'global/index');?>
	</li>
	

</ul>
<div class="title">
<h4><?php echo __('About us');?></h4>
</div>

<p><?php echo __('writed by Hosein Heidari, Ruholla Jahande, Amirali Akbari');?></p>
<!--<div class="small-title">
 <h4>Search</h4>
</div>
<form action="#" method="get" class="searchform">
<p><input type="text" id="searchq" name="q" /> <input type="submit"
	class="formbutton" value="Search" /></p>
</form>
 --> <!-- SIDEBAR --></div>

<div class="footer">
<p><a href="http://validator.w3.org/check/referer" title="valid XHTML">XHTML</a>
| <a href="http://jigsaw.w3.org/css-validator/check/referer"
	title="valid CSS">CSS</a> &nbsp;&nbsp; &copy; YourWebsiteName. Design:
<a href="http://www.spyka.net">spyka webmaster</a> | <a
	href="http://www.justfreetemplates.com">Free Web Templates</a></p>
</div>
</div>
</div>
</body>
</html>
