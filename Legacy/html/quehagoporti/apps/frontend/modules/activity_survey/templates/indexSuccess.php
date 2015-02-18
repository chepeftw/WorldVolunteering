<h1>Activity surveys List</h1>

<table>
  <thead>
    <tr>
      <th>Volunteer survey</th>
      <th>Association survey</th>
      <th>Field1</th>
      <th>Field2</th>
      <th>Field3</th>
      <th>Field4</th>
      <th>Field5</th>
      <th>Field6</th>
      <th>Field7</th>
      <th>Field8</th>
      <th>Field9</th>
      <th>Field10</th>
      <th>Field11</th>
      <th>Field12</th>
      <th>Field13</th>
      <th>Field14</th>
      <th>Field15</th>
      <th>Field16</th>
      <th>Field17</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Root</th>
      <th>Lft</th>
      <th>Rgt</th>
      <th>Level</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($activity_surveys as $activity_survey): ?>
    <tr>
      <td><a href="<?php echo url_for('activity_survey/show?volunteer_survey_id='.$activity_survey->getVolunteerSurveyId().'&association_survey_id='.$activity_survey->getAssociationSurveyId()) ?>"><?php echo $activity_survey->getVolunteerSurveyId() ?></a></td>
      <td><a href="<?php echo url_for('activity_survey/show?volunteer_survey_id='.$activity_survey->getVolunteerSurveyId().'&association_survey_id='.$activity_survey->getAssociationSurveyId()) ?>"><?php echo $activity_survey->getAssociationSurveyId() ?></a></td>
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
      <td><?php echo $activity_survey->getField15() ?></td>
      <td><?php echo $activity_survey->getField16() ?></td>
      <td><?php echo $activity_survey->getField17() ?></td>
      <td><?php echo $activity_survey->getCreatedAt() ?></td>
      <td><?php echo $activity_survey->getUpdatedAt() ?></td>
      <td><?php echo $activity_survey->getRootId() ?></td>
      <td><?php echo $activity_survey->getLft() ?></td>
      <td><?php echo $activity_survey->getRgt() ?></td>
      <td><?php echo $activity_survey->getLevel() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('activity_survey/new') ?>">New</a>
