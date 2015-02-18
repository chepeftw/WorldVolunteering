<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('association/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>  
  
	<?php echo $form->renderGlobalErrors() ?>  
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['name']->renderLabel() ?></th>
			<td>
			  <?php echo $form['name']->renderError() ?>
			  <?php echo $form['name'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<table>
  		  <tr>
			<th><?php echo $form['address']->renderLabel() ?></th>
			<td>
			  <?php echo $form['address']->renderError() ?>
			  <?php echo $form['address'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<legend>Ámbito geográfico</legend>
		<table>
		  <tr>
			<th><label>Ubicacion</label></th>
			<td>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['country_id']->renderLabel() ?></th>
			<td>
			  <?php echo $form['country_id']->renderError() ?>
			  <?php echo $form['country_id'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['department_id']->renderLabel() ?></th>
			<td>
			  <?php echo $form['department_id']->renderError() ?>
			  <?php echo $form['department_id'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['town']->renderLabel() ?></th>
			<td>
			  <?php echo $form['town']->renderError() ?>
			  <?php echo $form['town'] ?>
			</td>
		  </tr>
		  <tr>
			<th><br></th>
			<td>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['departments']->renderLabel() ?></th>
			<td>
			  <?php echo $form['departments']->renderError() ?>
			  <?php echo $form['departments'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<legend>Informacion</legend>
		<table>
		  <tr>
			<th><?php echo $form['mision']->renderLabel() ?></th>
			<td>
			  <?php echo $form['mision']->renderError() ?>
			  <?php echo $form['mision'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['vision']->renderLabel() ?></th>
			<td>
			  <?php echo $form['vision']->renderError() ?>
			  <?php echo $form['vision'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['about_us']->renderLabel() ?></th>
			<td>
			  <?php echo $form['about_us']->renderError() ?>
			  <?php echo $form['about_us'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['what_we_do']->renderLabel() ?></th>
			<td>
			  <?php echo $form['what_we_do']->renderError() ?>
			  <?php echo $form['what_we_do'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<legend>Persona Juridica</legend>
		<table>
		  <tr>
			<th><?php echo $form['legal_person']->renderLabel() ?></th>
			<td>
			  <?php echo $form['legal_person']->renderError() ?>
			  <?php echo $form['legal_person'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['legal_person_type']->renderLabel() ?></th>
			<td>
			  <?php echo $form['legal_person_type']->renderError() ?>
			  <?php echo $form['legal_person_type'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['legal_person_type_other']->renderLabel() ?></th>
			<td>
			  <?php echo $form['legal_person_type_other']->renderError() ?>
			  <?php echo $form['legal_person_type_other'] ?>
			</td>
		  </tr>
		  <tr>
			<th></th>
			<td><br></td>
		  </tr>
		  <tr>
			<th><?php echo $form['partner1_name']->renderLabel() ?></th>
			<td>
			  <?php echo $form['partner1_name']->renderError() ?>
			  <?php echo $form['partner1_name'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['partner1_email']->renderLabel() ?></th>
			<td>
			  <?php echo $form['partner1_email']->renderError() ?>
			  <?php echo $form['partner1_email'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['partner1_mobile']->renderLabel() ?></th>
			<td>
			  <?php echo $form['partner1_mobile']->renderError() ?>
			  <?php echo $form['partner1_mobile'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['partner2_name']->renderLabel() ?></th>
			<td>
			  <?php echo $form['partner2_name']->renderError() ?>
			  <?php echo $form['partner2_name'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['partner2_email']->renderLabel() ?></th>
			<td>
			  <?php echo $form['partner2_email']->renderError() ?>
			  <?php echo $form['partner2_email'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['partner2_mobile']->renderLabel() ?></th>
			<td>
			  <?php echo $form['partner2_mobile']->renderError() ?>
			  <?php echo $form['partner2_mobile'] ?>
			</td>
		  </tr>
		  <tr>
			<th></th>
			<td>
			  <br>
			  Por representante se entiende la persona que coordina el voluntariado en la organización y/o que tiene nombramiento como representante ante el Centro de Voluntariado Guatemalteco. No se refiere al Representante Legal de la organización.
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['sat_registry']->renderLabel() ?></th>
			<td>
			  <?php echo $form['sat_registry']->renderError() ?>
			  <?php echo $form['sat_registry'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['categories_list']->renderLabel() ?></th>
			<td>
			  <?php echo $form['categories_list']->renderError() ?>
			  <?php echo $form['categories_list'] ?>
			</td>
		  </tr>
		  <tr>
			<th></th>
			<td>
			  <br>
			  Puede seleccionar más de una opción.
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<legend>Informacion de Contacto</legend>
		<table>
		  <tr>
			<th><?php echo $form['email']->renderLabel() ?></th>
			<td>
			  <?php echo $form['email']->renderError() ?>
			  <?php echo $form['email'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['phone1']->renderLabel() ?></th>
			<td>
			  <?php echo $form['phone1']->renderError() ?>
			  <?php echo $form['phone1'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['phone2']->renderLabel() ?></th>
			<td>
			  <?php echo $form['phone2']->renderError() ?>
			  <?php echo $form['phone2'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['website']->renderLabel() ?></th>
			<td>
			  <?php echo $form['website']->renderError() ?>
			  <?php echo $form['website'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['facebook_page']->renderLabel() ?></th>
			<td>
			  <?php echo $form['facebook_page']->renderError() ?>
			  <?php echo $form['facebook_page'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['twitter_user']->renderLabel() ?></th>
			<td>
			  <?php echo $form['twitter_user']->renderError() ?>
			  <?php echo $form['twitter_user'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['logo']->renderLabel() ?></th>
			<td>
			  <?php echo $form['logo']->renderError() ?>
			  <?php echo $form['logo'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<legend>Tiempo de funcionamiento</legend>
		<table>
		  <tr>
			<th><?php echo $form['founded']->renderLabel() ?></th>
			<td>
			  <?php echo $form['founded']->renderError() ?>
			  <?php echo $form['founded'] ?>
			</td>
		  </tr>
		  <tr>
			<th></th>
			<td>
			  <br>
			  Se entiende por fecha de fundación, la fecha en la cual la organización inició actividades; no necesariamente cuando se conformó legalmente como organización, fundación, etc.
			  <br>
			  <br>
			</td>
		  </tr>		  
		  <tr>
			<th><?php echo $form['history']->renderLabel() ?></th>
			<td>
			  <?php echo $form['history']->renderError() ?>
			  <?php echo $form['history'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<legend>Cantidad de Voluntarios</legend>
		<table>
		  <tr>
			<th><label>Tipo</label></th>
			<td><label>Hombres</label></td>
			<td><label>Mujeres</label></td>
		  </tr>
		  <tr>
			<th><label>Permanentes</label></th>
			<td>
			  <?php echo $form['quantity_perm_men']->renderError() ?>
			  <?php echo $form['quantity_perm_men'] ?>
			</td>
			<td>
			  <?php echo $form['quantity_perm_women']->renderError() ?>
			  <?php echo $form['quantity_perm_women'] ?>
			</td>
		  </tr>
		  <tr>
			<th><label>Temporales</label></th>
			<td>
			  <?php echo $form['quantity_temp_men']->renderError() ?>
			  <?php echo $form['quantity_temp_men'] ?>
			</td>
			<td>
			  <?php echo $form['quantity_temp_women']->renderError() ?>
			  <?php echo $form['quantity_temp_women'] ?>
			</td>
		  </tr>
		</table>
		<table>
		  <tr>
			<th></th>
			<td>
			  <br>
			  Un voluntario es permanente cuando su trabajo es relativamente constante a lo largo del año o del período establecido por la Organización. Un voluntario es temporal cuando su trabajo se realiza solamente en actividades específicas.
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['requirements']->renderLabel() ?></th>
			<td>
			  <?php echo $form['requirements']->renderError() ?>
			  <?php echo $form['requirements'] ?>
			</td>
		  </tr>
		  <tr>
			<th></th>
			<td>
			<br>
			Describa los principales requisitos actuales que una persona necesita cumplir para ser voluntario en su organización.</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<legend>Compromiso</legend>
		<table>
		  <tr>
			<th></th>
			<td>Indique si sus voluntarios reciben algún tipo de compensación por el trabajo realizado.<br></td>
		  </tr>
		  <tr>
			<th><?php echo $form['commitment_type']->renderLabel() ?></th>
			<td>
			  <?php echo $form['commitment_type']->renderError() ?>
			  <?php echo $form['commitment_type'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['commitment_type_other']->renderLabel() ?></th>
			<td>
			  <?php echo $form['commitment_type_other']->renderError() ?>
			  <?php echo $form['commitment_type_other'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['commitment']->renderLabel() ?></th>
			<td>
			  <?php echo $form['commitment']->renderError() ?>
			  <?php echo $form['commitment'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['mechanism_commitment']->renderLabel() ?></th>
			<td>
			  <?php echo $form['mechanism_commitment']->renderError() ?>
			  <?php echo $form['mechanism_commitment'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<legend>Compensación</legend>
		<table>
		  <tr>
			<th><?php echo $form['compensation']->renderLabel() ?></th>
			<td>
			  <?php echo $form['compensation']->renderError() ?>
			  <?php echo $form['compensation'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['compensation_type']->renderLabel() ?></th>
			<td>
			  <?php echo $form['compensation_type']->renderError() ?>
			  <?php echo $form['compensation_type'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['compensation_type_other']->renderLabel() ?></th>
			<td>
			  <?php echo $form['compensation_type_other']->renderError() ?>
			  <?php echo $form['compensation_type_other'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<legend>Capacitación</legend>
		<table>
		  <tr>
			<th><?php echo $form['training']->renderLabel() ?></th>
			<td>
			  <?php echo $form['training']->renderError() ?>
			  <?php echo $form['training'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['training_type']->renderLabel() ?></th>
			<td>
			  <?php echo $form['training_type']->renderError() ?>
			  <?php echo $form['training_type'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['training_type_other']->renderLabel() ?></th>
			<td>
			  <?php echo $form['training_type_other']->renderError() ?>
			  <?php echo $form['training_type_other'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<legend>Donaciones</legend>
		<table>
		  <tr>
			<th><?php echo $form['donations']->renderLabel() ?></th>
			<td>
			  <?php echo $form['donations']->renderError() ?>
			  <?php echo $form['donations'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['method']->renderLabel() ?></th>
			<td>
			  <?php echo $form['method']->renderError() ?>
			  <?php echo $form['method'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['utilization']->renderLabel() ?></th>
			<td>
			  <?php echo $form['utilization']->renderError() ?>
			  <?php echo $form['utilization'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['captcha']->renderLabel() ?></th>
			<td>
			  <?php echo $form['captcha']->renderError() ?>
			  <?php echo $form['captcha'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	
	<br>
	<table>
      <tr>
        <td id="save" colspan="2" >
		  <input  type="hidden" value="<?php echo $sf_user->getGuardUser()->getId() ?>" name="association[user_id]" />
		  <input type="hidden" value="<?php echo $sf_request->getRemoteAddress() ?>" name="association[ip_address]" />
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Enviar" />
        </td>
      </tr>
	</table>
</form>
