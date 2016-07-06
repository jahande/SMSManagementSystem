<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    
  </head>
  <body>
  <div id="systemMessages">
    <?php if (rand(0, 1000)<10) Schedule::check()?>
  </div>
  <div id="content">
    <?php echo $sf_content ?>
 </div>
 <div id="navigation">
 <?php echo link_to(__('New Contest'),'contest/index');?>
 <br />
 <!-- <?php echo link_to(__('Edit Contests'),'contest/edit');?>
 <br />
  <?php echo link_to(__('Update Contests'),'contest/update');?>
 <br />
 <?php echo link_to(__('Delete Contests'),'contest/delete');?>
 <br />
  --> 
 <?php echo link_to(__('Contest Results'),'contest/results');?>
 <br />
 <?php echo link_to(__('Perform Contest'),'contest/perform');?>
 <br />
 <?php echo link_to(__('Search Contest'),'contest/search');?>
 <br />
 
 <?php echo link_to(__('export'),'personManaging/exportPhoneNumbers');?>
 <br />
<?php echo link_to(__('Person Managing'),'personManaging/index');?>
 <br />
 <?php echo link_to(__('Groups Managing'),'groupsManaging/index');?>
 <br />
 <?php echo link_to(__('Sent Massage Managing'),'sentManaging/index');?>
 <br />
 <?php echo link_to(__('Poll Managing'),'pollManaging/index');?>
 <br />
 <?php echo link_to(__('Poll Data Managing'),'pollDataManaging/index');?>
 <br />
 <?php echo link_to(__('Poll Choice Managing'),'pollChoiceManaging/index');?>
 <br />
 <?php echo link_to(__('Show polls statistics'),'pollManaging/ShowStatistics');?>
 <br />
 <?php echo link_to(__('Send polls results'),'pollManaging/sendResults');?>
 <br />
 <?php echo link_to(__('Add Poll Choice'),'pollChoiceManaging/AddMultipleChoice');?>
 <br />
 <?php echo link_to(__('Responder Managing'),'respondManaging/index');?>
 <br />
 <?php echo link_to(__('Election Managing'),'pollManaging/index');?>
 <br />
 <?php echo link_to(__('Election Data Managing'),'pollDataManaging/index');?>
 <br />
 <?php echo link_to(__('Election Choice Managing'),'pollChoiceManaging/index');?>
 <br />
 
 <?php echo link_to(__('register Managing'),'registerManaging/index');?>
 <br />
 <?php echo link_to(__('Register Data Managing'),'registerDataManaging/index');?>
 <br />
 <?php echo link_to(__('Election Managing'),'electionManaging/index');?>
 <br />
 <?php echo link_to(__('Virtual sender'),'router/virtualSender');?>
 <br />
 <?php echo link_to(__('Show registers statistics'),'registerManaging/ShowStatistics');?>
 <br />
 <?php echo link_to(__('Settings'),'settings/index');?>
 <br />
 
 </div>
  </body>
</html>
