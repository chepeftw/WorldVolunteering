<?php use_helper('I18N') ?>
<?php echo __('Hola %first_name%', array('%first_name%' => $user->getFirstName()), 'sf_guard') ?>,<br/><br/>

<?php echo __('Este mensaje te fue enviado ya que solicitaste informacion en como recuperar tu contraseña.', null, 'sf_guard') ?><br/><br/>

<?php echo __('Puedes cambiar tu contraseña ingresando al link que te enviamos abajo, recuerda que solo sera valido por 24 horas:', null, 'sf_guard') ?><br/><br/>

<?php echo link_to(__('Click para cambiar tu password', null, 'sf_guard'), '@sf_guard_forgot_password_change?unique_key='.$forgot_password->unique_key, 'absolute=true') ?>
