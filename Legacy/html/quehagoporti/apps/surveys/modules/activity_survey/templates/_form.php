<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script type="text/javascript">
	function myConfirm()
	{
		$.alerts.okButton = ' Si ';
		$.alerts.cancelButton = ' No ';
		jConfirm('Participas en otra organizacion de voluntariado?', 'Mas voluntariados?', function(r) {
			var success = 1;
			if( r == true )
			{
				$("#activity_form").attr("action","<?php echo url_for('activity_survey/'.($form->getObject()->isNew() ? 'create' : 'update').'?suc=1'.(!$form->getObject()->isNew() ? '&volunteer_survey_id='.$form->getObject()->getVolunteerSurveyId().'&association_survey_id='.$form->getObject()->getAssociationSurveyId() : '')) ?>");
			}
			else
			{
				$("#activity_form").attr("action","<?php echo url_for('activity_survey/'.($form->getObject()->isNew() ? 'create' : 'update').'?suc=0'.(!$form->getObject()->isNew() ? '&volunteer_survey_id='.$form->getObject()->getVolunteerSurveyId().'&association_survey_id='.$form->getObject()->getAssociationSurveyId() : '')) ?>");
			}
			$("#activity_form").submit();
		});
	}
</script>

<p>En qué tipo de actividades realizas tu voluntariado y cuántas horas semanales le
dedicas (puede ser más de una actividad en cada Organización que participas).
Para ello selecciona una de las organizaciones en las cuales realizas tu voluntariado. Luego ingresa
la cantidad de horas que dedicas semanalmente a cada una de las actividades de la organización
que seleccionaste y selecciona “Guardar”. Si realizas actividades en otra organización de
voluntariado vuelve a repetir el proceso.</p>

<form id="activity_form" action="<?php echo url_for('activity_survey/'.($form->getObject()->isNew() ? 'create' : 'update').'?suc=0'.(!$form->getObject()->isNew() ? '&volunteer_survey_id='.$form->getObject()->getVolunteerSurveyId().'&association_survey_id='.$form->getObject()->getAssociationSurveyId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<?php echo $form->renderGlobalErrors() ?>

<fieldset>
	<table>
	  <tr>
        <th><?php echo $form['association_survey_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['association_survey_id']->renderError() ?>
          <?php echo $form['association_survey_id'] ?>
          <input type="hidden" id="activity_survey_volunteer_survey_id" name="activity_survey[volunteer_survey_id]" value="<?php echo $volunteer_survey->getId() ?>" />
        </td>
      </tr>
	</table>
</fieldset>
<br>

<fieldset>
	<table>
	  <tr>
        <th><?php echo $form['field1']->renderLabel() ?></th>
        <td>
          <?php echo $form['field1']->renderError() ?>
          <?php echo $form['field1'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field2']->renderLabel() ?></th>
        <td>
          <?php echo $form['field2']->renderError() ?>
          <?php echo $form['field2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field3']->renderLabel() ?></th>
        <td>
          <?php echo $form['field3']->renderError() ?>
          <?php echo $form['field3'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field4']->renderLabel() ?></th>
        <td>
          <?php echo $form['field4']->renderError() ?>
          <?php echo $form['field4'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field5']->renderLabel() ?></th>
        <td>
          <?php echo $form['field5']->renderError() ?>
          <?php echo $form['field5'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field6']->renderLabel() ?></th>
        <td>
          <?php echo $form['field6']->renderError() ?>
          <?php echo $form['field6'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field7']->renderLabel() ?></th>
        <td>
          <?php echo $form['field7']->renderError() ?>
          <?php echo $form['field7'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field8']->renderLabel() ?></th>
        <td>
          <?php echo $form['field8']->renderError() ?>
          <?php echo $form['field8'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field9']->renderLabel() ?></th>
        <td>
          <?php echo $form['field9']->renderError() ?>
          <?php echo $form['field9'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field10']->renderLabel() ?></th>
        <td>
          <?php echo $form['field10']->renderError() ?>
          <?php echo $form['field10'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field11']->renderLabel() ?></th>
        <td>
          <?php echo $form['field11']->renderError() ?>
          <?php echo $form['field11'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field12']->renderLabel() ?></th>
        <td>
          <?php echo $form['field12']->renderError() ?>
          <?php echo $form['field12'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field13']->renderLabel() ?></th>
        <td>
          <?php echo $form['field13']->renderError() ?>
          <?php echo $form['field13'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field14']->renderLabel() ?></th>
        <td>
          <?php echo $form['field14']->renderError() ?>
          <?php echo $form['field14'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field16']->renderLabel() ?></th>
        <td>
          <?php echo $form['field16']->renderError() ?>
          <?php echo $form['field16'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['field17']->renderLabel() ?></th>
        <td>
          <?php echo $form['field17']->renderError() ?>
          <?php echo $form['field17'] ?>
        </td>
      </tr>
	</table>
</fieldset>
	
	
<fieldset>
  <table>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="button" value="Guardar" onclick="myConfirm()" />
        </td>
      </tr>
  </table>
</fieldset>

</form>
