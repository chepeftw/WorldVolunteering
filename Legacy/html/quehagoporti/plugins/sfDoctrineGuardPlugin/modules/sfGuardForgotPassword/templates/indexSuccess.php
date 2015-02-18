<?php use_helper('I18N') ?>
<h2><?php echo __('Olvidaste tu contraseña?', null, 'sf_guard') ?></h2>

<p>
  <?php echo __('No tengas pena, nosotros podemos ayudarte para recuperar tu contraseña de forma segura!', null, 'sf_guard') ?>
  <?php echo __('Ingresa tu correo electronico con el que te registraste para enviarte un mensaje con la informacion para recuperar tu contraseña.', null, 'sf_guard') ?>
</p>

<form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot><tr><td><input type="submit" name="Solicitar" value="<?php echo __('Solicitar', null, 'sf_guard') ?>" /></td></tr></tfoot>
  </table>
</form>
