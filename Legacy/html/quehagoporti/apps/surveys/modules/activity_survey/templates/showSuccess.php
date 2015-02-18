<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $activity_survey->getId() ?></td>
    </tr>
    <tr>
      <th>Volunteer survey:</th>
      <td><?php echo $activity_survey->getVolunteerSurveyId() ?></td>
    </tr>
    <tr>
      <th>Association survey:</th>
      <td><?php echo $activity_survey->getAssociationSurveyId() ?></td>
    </tr>
    <tr>
      <th>Field1:</th>
      <td><?php echo $activity_survey->getField1() ?></td>
    </tr>
    <tr>
      <th>Field2:</th>
      <td><?php echo $activity_survey->getField2() ?></td>
    </tr>
    <tr>
      <th>Field3:</th>
      <td><?php echo $activity_survey->getField3() ?></td>
    </tr>
    <tr>
      <th>Field4:</th>
      <td><?php echo $activity_survey->getField4() ?></td>
    </tr>
    <tr>
      <th>Field5:</th>
      <td><?php echo $activity_survey->getField5() ?></td>
    </tr>
    <tr>
      <th>Field6:</th>
      <td><?php echo $activity_survey->getField6() ?></td>
    </tr>
    <tr>
      <th>Field7:</th>
      <td><?php echo $activity_survey->getField7() ?></td>
    </tr>
    <tr>
      <th>Field8:</th>
      <td><?php echo $activity_survey->getField8() ?></td>
    </tr>
    <tr>
      <th>Field9:</th>
      <td><?php echo $activity_survey->getField9() ?></td>
    </tr>
    <tr>
      <th>Field10:</th>
      <td><?php echo $activity_survey->getField10() ?></td>
    </tr>
    <tr>
      <th>Field11:</th>
      <td><?php echo $activity_survey->getField11() ?></td>
    </tr>
    <tr>
      <th>Field12:</th>
      <td><?php echo $activity_survey->getField12() ?></td>
    </tr>
    <tr>
      <th>Field13:</th>
      <td><?php echo $activity_survey->getField13() ?></td>
    </tr>
    <tr>
      <th>Field14:</th>
      <td><?php echo $activity_survey->getField14() ?></td>
    </tr>
    <tr>
      <th>Field15:</th>
      <td><?php echo $activity_survey->getField15() ?></td>
    </tr>
    <tr>
      <th>Field16:</th>
      <td><?php echo $activity_survey->getField16() ?></td>
    </tr>
    <tr>
      <th>Field17:</th>
      <td><?php echo $activity_survey->getField17() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $activity_survey->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $activity_survey->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('activity_survey/edit?id='.$activity_survey->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('activity_survey/index') ?>">List</a>
