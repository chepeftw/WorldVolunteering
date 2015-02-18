<h1>Voluntario</h1>

<p>
	<?php echo $volunteer_survey->getName() ?>
	<br>
	<?php echo $volunteer_survey->getEmail() ?>
</p>

<br>

<?php if( count($activity_surveys) ): ?>
<h2>Asociaciones</h2>
<?php $i = 1 ?>
    <?php foreach ($activity_surveys as $activity_survey): ?>
	<table>
		<tr>
			<td><?php echo $activity_survey->getAssociationSurvey() ?></td>
			<td style="padding-left:30px;"><a href="#" id="group_show<?php echo $i ?>">Expandir</a></td>
			<td>&nbsp;<?php echo link_to('Borrar', 'activity_survey/delete?id='.$activity_survey->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?')) ?></td>
		</tr>
	</table>
	
	<div id="group<?php echo $i ?>" style="display:none">
		<table class="group">
		  <tbody>
			<tr>
			  <th><?php echo $form['field1']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField1() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field2']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField2() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field3']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField3() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field4']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField4() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field5']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField5() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field6']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField6() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field7']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField7() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field8']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField8() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field9']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField9() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field10']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField10() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field11']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField11() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field12']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField12() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field13']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField13() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field14']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField14() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field16']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField16() ?></td>
			</tr>
			<tr>
			  <th><?php echo $form['field17']->renderLabel() ?></th>
			  <td><?php echo $activity_survey->getField17() ?></td>
			</tr>
		  </tbody>
		</table>
	</div>
	
	<?php $i++ ?>
    <?php endforeach; ?>
    
<br>
<br>
<?php endif; ?>

<?php include_partial('form', array('form' => $form, 'volunteer_survey' => $volunteer_survey)) ?>

<script>
<?php $i = 1 ?>
<?php foreach ($activity_surveys as $activity_survey): ?>
$('#group_show<?php echo $i ?>').click(function () { $("#group<?php echo $i ?>").toggle('middle'); return false; });
<?php $i++; ?>
<?php endforeach; ?>
</script>
