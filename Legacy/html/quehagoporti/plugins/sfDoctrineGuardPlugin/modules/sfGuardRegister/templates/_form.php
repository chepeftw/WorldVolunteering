<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_register') ?>" method="post">
  <table>
    <?php echo $form ?>
    <tfoot>
      <tr>
		<th></th>
        <td>
          <input type="submit" name="register" value="<?php echo __('Regístrate', null, 'sf_guard') ?>" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>
