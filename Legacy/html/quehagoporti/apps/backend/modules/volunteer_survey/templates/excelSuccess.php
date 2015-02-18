<h1>Listado de Voluntarios</h1>

<table>
  <thead>
    <tr>
	  <th>Id</th>
	  <th><?php echo $formV['name']->renderLabel() ?></th>
	  <th><?php echo $formV['email']->renderLabel() ?></th>
	  <th><?php echo $formV['age']->renderLabel() ?></th>
	  <th><?php echo $formV['sex']->renderLabel() ?></th>
	  <th><?php echo $formV['status']->renderLabel() ?></th>
	  <th><?php echo $formV['status']->renderLabel().' '.$formV['status_other']->renderLabel() ?></th>
	  <th><?php echo $formV['kids']->renderLabel() ?></th>
	  <th><?php echo $formV['ethnic']->renderLabel() ?></th>
	  <th><?php echo $formV['ethnic']->renderLabel().' '.$formV['ethnic_other']->renderLabel() ?></th>
	  <th><?php echo $formV['schooling']->renderLabel() ?></th>
	  <th><?php echo $formV['schooling_discipline']->renderLabel() ?></th>
	  <th><?php echo $formV['occupation']->renderLabel() ?></th>
	  <th><?php echo $formV['religion']->renderLabel() ?></th>
	  <th><?php echo $formV['religion']->renderLabel().' '.$formV['religion_other']->renderLabel() ?></th>
	  <th><?php echo $formV['voluteering_time']->renderLabel() ?></th>
	  <th>Fecha de Ingreso</th>
      
      <?php for( $i = 0; $i < $max_activities; $i++ ): ?>
      <th><?php echo $formA['association_survey_id']->renderLabel() ?></th>
      <th><?php echo $formA['field1']->renderLabel() ?></th>
      <th><?php echo $formA['field2']->renderLabel() ?></th>
      <th><?php echo $formA['field3']->renderLabel() ?></th>
      <th><?php echo $formA['field4']->renderLabel() ?></th>
      <th><?php echo $formA['field5']->renderLabel() ?></th>
      <th><?php echo $formA['field6']->renderLabel() ?></th>
      <th><?php echo $formA['field7']->renderLabel() ?></th>
      <th><?php echo $formA['field8']->renderLabel() ?></th>
      <th><?php echo $formA['field9']->renderLabel() ?></th>
      <th><?php echo $formA['field10']->renderLabel() ?></th>
      <th><?php echo $formA['field11']->renderLabel() ?></th>
      <th><?php echo $formA['field12']->renderLabel() ?></th>
      <th><?php echo $formA['field13']->renderLabel() ?></th>
      <th><?php echo $formA['field14']->renderLabel() ?></th>
      <th><?php echo $formA['field16']->renderLabel() ?></th>
      <th><?php echo $formA['field17']->renderLabel() ?></th>
      <?php endfor; ?>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($volunteer_surveys as $volunteer_survey): ?>
    <tr>
      <td><?php echo $volunteer_survey->getId() ?></td>
      <td><?php echo html_entity_decode( $volunteer_survey->getName() ) ?></td>
      <td><?php echo html_entity_decode( $volunteer_survey->getEmail() ) ?></td>
      <td><?php echo $volunteer_survey->getAge() ?></td>
      <td><?php echo $volunteer_survey->getSex() ?></td>
      <td><?php echo $volunteer_survey->getStatus() ?></td>
      <td><?php echo $volunteer_survey->getStatusOther() ?></td>
      <td><?php echo $volunteer_survey->getKids() ?></td>
      <td><?php echo $volunteer_survey->getEthnic() ?></td>
      <td><?php echo $volunteer_survey->getEthnicOther() ?></td>
      <td><?php echo $volunteer_survey->getSchooling() ?></td>
      <td><?php echo $volunteer_survey->getSchoolingDiscipline() ?></td>
      <td><?php echo $volunteer_survey->getOccupation() ?></td>
      <td><?php echo $volunteer_survey->getReligion() ?></td>
      <td><?php echo $volunteer_survey->getReligionOther() ?></td>
      <td><?php echo $volunteer_survey->getVoluteeringTime() ?></td>
      <td><?php echo $volunteer_survey->getCreatedAt() ?></td>
      
      <?php foreach ($volunteer_survey->getActivities() as $activity_survey): ?>
		  <td><?php echo $activity_survey->getAssociationSurvey() ?></td>
		  <td><?php echo $activity_survey->getField1() ?></td>
		  <td><?php echo $activity_survey->getField2() ?></td>
		  <td><?php echo $activity_survey->getField3() ?></td>
		  <td><?php echo $activity_survey->getField4() ?></td>
		  <td><?php echo $activity_survey->getField5() ?></td>
		  <td><?php echo $activity_survey->getField6() ?></td>
		  <td><?php echo $activity_survey->getField7() ?></td>
		  <td><?php echo $activity_survey->getField8() ?></td>
		  <td><?php echo $activity_survey->getField9() ?></td>
		  <td><?php echo $activity_survey->getField10() ?></td>
		  <td><?php echo $activity_survey->getField11() ?></td>
		  <td><?php echo $activity_survey->getField12() ?></td>
		  <td><?php echo $activity_survey->getField13() ?></td>
		  <td><?php echo $activity_survey->getField14() ?></td>
		  <td><?php echo $activity_survey->getField16() ?></td>
		  <td><?php echo $activity_survey->getField17() ?></td>
	  <?php unset($activity_survey); ?>
	  <?php endforeach; ?>
      
    </tr>
    <?php unset($volunteer_survey); ?>
    <?php endforeach; ?>
  </tbody>
</table>
