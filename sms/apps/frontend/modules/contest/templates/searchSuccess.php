<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form method="post"> 
  <table id="job_form">
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="<?php echo __('search')?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>