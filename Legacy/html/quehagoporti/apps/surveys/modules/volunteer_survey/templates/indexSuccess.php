<h1>Volunteer surveys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Age</th>
      <th>Sex</th>
      <th>Status</th>
      <th>Status other</th>
      <th>Kids</th>
      <th>Ethnic</th>
      <th>Ethnic other</th>
      <th>Schooling</th>
      <th>Schooling discipline</th>
      <th>Occupation</th>
      <th>Religion</th>
      <th>Religion other</th>
      <th>Voluteering time</th>
      <th>Ip address</th>
      <th>Is active</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Deleted at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($volunteer_surveys as $volunteer_survey): ?>
    <tr>
      <td><a href="<?php echo url_for('volunteer_survey/show?id='.$volunteer_survey->getId()) ?>"><?php echo $volunteer_survey->getId() ?></a></td>
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
      <td><?php echo $volunteer_survey->getIpAddress() ?></td>
      <td><?php echo $volunteer_survey->getIsActive() ?></td>
      <td><?php echo $volunteer_survey->getCreatedAt() ?></td>
      <td><?php echo $volunteer_survey->getUpdatedAt() ?></td>
      <td><?php echo $volunteer_survey->getDeletedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('volunteer_survey/new') ?>">New</a>
