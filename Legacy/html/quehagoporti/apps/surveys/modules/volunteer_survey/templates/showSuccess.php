<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $volunteer_survey->getId() ?></td>
    </tr>
    <tr>
      <th>Age:</th>
      <td><?php echo $volunteer_survey->getAge() ?></td>
    </tr>
    <tr>
      <th>Sex:</th>
      <td><?php echo $volunteer_survey->getSex() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $volunteer_survey->getStatus() ?></td>
    </tr>
    <tr>
      <th>Status other:</th>
      <td><?php echo $volunteer_survey->getStatusOther() ?></td>
    </tr>
    <tr>
      <th>Kids:</th>
      <td><?php echo $volunteer_survey->getKids() ?></td>
    </tr>
    <tr>
      <th>Ethnic:</th>
      <td><?php echo $volunteer_survey->getEthnic() ?></td>
    </tr>
    <tr>
      <th>Ethnic other:</th>
      <td><?php echo $volunteer_survey->getEthnicOther() ?></td>
    </tr>
    <tr>
      <th>Schooling:</th>
      <td><?php echo $volunteer_survey->getSchooling() ?></td>
    </tr>
    <tr>
      <th>Schooling discipline:</th>
      <td><?php echo $volunteer_survey->getSchoolingDiscipline() ?></td>
    </tr>
    <tr>
      <th>Occupation:</th>
      <td><?php echo $volunteer_survey->getOccupation() ?></td>
    </tr>
    <tr>
      <th>Religion:</th>
      <td><?php echo $volunteer_survey->getReligion() ?></td>
    </tr>
    <tr>
      <th>Religion other:</th>
      <td><?php echo $volunteer_survey->getReligionOther() ?></td>
    </tr>
    <tr>
      <th>Voluteering time:</th>
      <td><?php echo $volunteer_survey->getVoluteeringTime() ?></td>
    </tr>
    <tr>
      <th>Ip address:</th>
      <td><?php echo $volunteer_survey->getIpAddress() ?></td>
    </tr>
    <tr>
      <th>Is active:</th>
      <td><?php echo $volunteer_survey->getIsActive() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $volunteer_survey->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $volunteer_survey->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Deleted at:</th>
      <td><?php echo $volunteer_survey->getDeletedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('volunteer_survey/edit?id='.$volunteer_survey->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('volunteer_survey/index') ?>">List</a>
