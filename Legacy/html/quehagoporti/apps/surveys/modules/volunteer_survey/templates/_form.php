<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('volunteer_survey/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
		  <tr>
			<th><?php echo $form['email']->renderLabel() ?></th>
			<td>
			  <?php echo $form['email']->renderError() ?>
			  <?php echo $form['email'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	<br>
	
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['age']->renderLabel() ?></th>
			<td>
			  <?php echo $form['age']->renderError() ?>
			  <?php echo $form['age'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	<br>
	
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['sex']->renderLabel() ?></th>
			<td>
			  <?php echo $form['sex']->renderError() ?>
			  <?php echo $form['sex'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	<br>
	
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['status']->renderLabel() ?></th>
			<td>
			  <?php echo $form['status']->renderError() ?>
			  <?php echo $form['status'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['status_other']->renderLabel() ?></th>
			<td>
			  <?php echo $form['status_other']->renderError() ?>
			  <?php echo $form['status_other'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	<br>
	
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['kids']->renderLabel() ?></th>
			<td>
			  <?php echo $form['kids']->renderError() ?>
			  <?php echo $form['kids'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	<br>
	
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['ethnic']->renderLabel() ?></th>
			<td>
			  <?php echo $form['ethnic']->renderError() ?>
			  <?php echo $form['ethnic'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['ethnic_other']->renderLabel() ?></th>
			<td>
			  <?php echo $form['ethnic_other']->renderError() ?>
			  <?php echo $form['ethnic_other'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	<br>
	
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['schooling']->renderLabel() ?></th>
			<td>
			  <?php echo $form['schooling']->renderError() ?>
			  <?php echo $form['schooling'] ?>
			</td>
		  </tr>
		  <tr>
			<th></th>
			<td>
			  <br>
			  Seleccionar el último grado cursado o que actualmente esté cursando aunque este no haya sido completado.
			  <br>
			  <br>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['schooling_discipline']->renderLabel() ?></th>
			<td>
			  <?php echo $form['schooling_discipline']->renderError() ?>
			  <?php echo $form['schooling_discipline'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	<br>
	
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['occupation']->renderLabel() ?></th>
			<td>
			  <?php echo $form['occupation']->renderError() ?>
			  <?php echo $form['occupation'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	<br>
	
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['nationality']->renderLabel() ?></th>
			<td>
			  <?php echo $form['nationality']->renderError() ?>
			  <?php echo $form['nationality'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['nationality_other']->renderLabel() ?></th>
			<td>
			  <?php echo $form['nationality_other']->renderError() ?>
			  <?php echo $form['nationality_other'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	<br>
	
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['religion']->renderLabel() ?></th>
			<td>
			  <?php echo $form['religion']->renderError() ?>
			  <?php echo $form['religion'] ?>
			</td>
		  </tr>
		  <tr>
			<th><?php echo $form['religion_other']->renderLabel() ?></th>
			<td>
			  <?php echo $form['religion_other']->renderError() ?>
			  <?php echo $form['religion_other'] ?>
			</td>
		  </tr>
		</table>
	</fieldset>
	<br>
	
  	<fieldset>
		<table>
		  <tr>
			<th><?php echo $form['voluteering_time']->renderLabel() ?></th>
			<td>
			  <?php echo $form['voluteering_time']->renderError() ?>
			  <?php echo $form['voluteering_time'] ?>
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
        <td id="save" colspan="2">
		  <input type="hidden" value="<?php echo $sf_request->getRemoteAddress() ?>" id="volunteer_survey_ip_address" name="volunteer_survey[ip_address]" />
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Siguiente" />
        </td>
      </tr>
  </table>
</form>
