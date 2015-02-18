<?php use_helper('I18N') ?>
<h1><?php echo __('Afiliate', null, 'sf_guard') ?></h1>
<br>
<p><strong>El Centro de Voluntariado Guatemalteco invita a todas las organizaciones, que no estén registradas todavía en la página, para que ingresen su información y así puedan ser publicadas en el directorio de organizaciones de voluntarios o que utilizan el esfuerzo voluntario para sus actividades.</strong></p>

<br>
<p>Si ya tienes tu usario, porfavor ingresa <a href="<?php echo url_for('sf_guard_signin') ?>">aqui</a>.</p>
<p>Los campos con * son obligatorios.</p>

<?php echo get_partial('sfGuardRegister/form', array('form' => $form)) ?>
