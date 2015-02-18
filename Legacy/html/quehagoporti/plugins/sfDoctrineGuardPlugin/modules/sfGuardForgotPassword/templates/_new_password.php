<?php use_helper('I18N') ?>
<?php echo __('Hola %first_name%', array('%first_name%' => $user->getFirstName()), 'sf_guard') ?>,

<?php echo __('Aqui te enviamos tu contraseña:') ?> 

<?php echo __('Contraseña', null, 'sf_guard') ?>: <?php echo $password ?>
