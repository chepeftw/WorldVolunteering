<h1>Listado de Asociaciones</h1>

<table>
  <thead>
    <tr>
      <th><?php echo $form['name']->renderLabel() ?></th>
      <th><?php echo $form['address']->renderLabel() ?></th>
      <th><?php echo $form['country_id']->renderLabel() ?></th>
      <th><?php echo $form['department_id']->renderLabel() ?></th>
      <th><?php echo $form['town']->renderLabel() ?></th>
      <th><?php echo $form['mision']->renderLabel() ?></th>
      <th><?php echo $form['vision']->renderLabel() ?></th>
      <th><?php echo $form['about_us']->renderLabel() ?></th>
      <th><?php echo $form['what_we_do']->renderLabel() ?></th>
      <th><?php echo $form['legal_person']->renderLabel() ?></th>
      <th><?php echo $form['legal_person_type']->renderLabel() ?></th>
      <th><?php echo $form['legal_person_type']->renderLabel().' '.$form['legal_person_type_other']->renderLabel() ?></th>
      <th><?php echo $form['partner1_name']->renderLabel() ?></th>
      <th><?php echo $form['partner1_email']->renderLabel() ?></th>
      <th><?php echo $form['partner1_mobile']->renderLabel() ?></th>
      <th><?php echo $form['partner2_name']->renderLabel() ?></th>
      <th><?php echo $form['partner2_email']->renderLabel() ?></th>
      <th><?php echo $form['partner2_mobile']->renderLabel() ?></th>
      <th><?php echo $form['sat_registry']->renderLabel() ?></th>
      <th><?php echo $form['email']->renderLabel() ?></th>
      <th><?php echo $form['phone1']->renderLabel() ?></th>
      <th><?php echo $form['phone2']->renderLabel() ?></th>
      <th><?php echo $form['website']->renderLabel() ?></th>
      <th><?php echo $form['facebook_page']->renderLabel() ?></th>
      <th><?php echo $form['twitter_user']->renderLabel() ?></th>
      <th><?php echo $form['founded']->renderLabel() ?></th>
      <th><?php echo $form['history']->renderLabel() ?></th>
      <th><?php echo $form['quantity_perm_men']->renderLabel() ?></th>
      <th><?php echo $form['quantity_perm_women']->renderLabel() ?></th>
      <th><?php echo $form['quantity_temp_men']->renderLabel() ?></th>
      <th><?php echo $form['quantity_temp_women']->renderLabel() ?></th>
      <th><?php echo $form['requirements']->renderLabel() ?></th>
      <th><?php echo $form['commitment_type']->renderLabel() ?></th>
      <th><?php echo $form['commitment']->renderLabel() ?></th>
      <th><?php echo $form['mechanism_commitment']->renderLabel() ?></th>
      <th><?php echo $form['compensation']->renderLabel() ?></th>
      <th><?php echo $form['compensation_type']->renderLabel() ?></th>
      <th><?php echo $form['compensation_type']->renderLabel().' '.$form['compensation_type_other']->renderLabel() ?></th>
      <th><?php echo $form['training']->renderLabel() ?></th>
      <th><?php echo $form['training_type']->renderLabel() ?></th>
      <th><?php echo $form['training_type']->renderLabel().' '.$form['training_type_other']->renderLabel() ?></th>
      <th><?php echo $form['donations']->renderLabel() ?></th>
      <th><?php echo $form['method']->renderLabel() ?></th>
      <th><?php echo $form['utilization']->renderLabel() ?></th>
      <th>Fecha de Ingreso</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($association_surveys as $association_survey): ?>
    <tr>
      <td><?php echo $association_survey->getName() ?></td>
      <td><?php echo $association_survey->getAddress() ?></td>
      <td><?php echo $association_survey->getCountry() ?></td>
      <td><?php echo $association_survey->getDepartment() ?></td>
      <td><?php echo $association_survey->getTown() ?></td>
      <td><?php echo $association_survey->getMision() ?></td>
      <td><?php echo $association_survey->getVision() ?></td>
      <td><?php echo $association_survey->getAboutUs() ?></td>
      <td><?php echo $association_survey->getWhatWeDo() ?></td>
      <td><?php echo $association_survey->getLegalPerson() ?></td>
      <td><?php echo $association_survey->getLegalPersonType() ?></td>
      <td><?php echo $association_survey->getLegalPersonTypeOther() ?></td>
      <td><?php echo $association_survey->getPartner1Name() ?></td>
      <td><?php echo $association_survey->getPartner1Email() ?></td>
      <td><?php echo $association_survey->getPartner1Mobile() ?></td>
      <td><?php echo $association_survey->getPartner2Name() ?></td>
      <td><?php echo $association_survey->getPartner2Email() ?></td>
      <td><?php echo $association_survey->getPartner2Mobile() ?></td>
      <td><?php echo $association_survey->getSatRegistryString() ?></td>
      <td><?php echo $association_survey->getEmail() ?></td>
      <td><?php echo $association_survey->getPhone1() ?></td>
      <td><?php echo $association_survey->getPhone2() ?></td>
      <td><?php echo $association_survey->getWebsite() ?></td>
      <td><?php echo $association_survey->getFacebookPage() ?></td>
      <td><?php echo $association_survey->getTwitterUser() ?></td>
      <td><?php echo $association_survey->getFounded() ?></td>
      <td><?php echo $association_survey->getHistory() ?></td>
      <td><?php echo $association_survey->getQuantityPermMen() ?></td>
      <td><?php echo $association_survey->getQuantityPermWomen() ?></td>
      <td><?php echo $association_survey->getQuantityTempMen() ?></td>
      <td><?php echo $association_survey->getQuantityTempWomen() ?></td>
      <td><?php echo $association_survey->getRequirements() ?></td>
      <td><?php echo $association_survey->getCommitmentType() ?></td>
      <td><?php echo $association_survey->getCommitment() ?></td>
      <td><?php echo $association_survey->getMechanismCommitment() ?></td>
      <td><?php echo $association_survey->getCompensation() ?></td>
      <td><?php echo $association_survey->getCompensationType() ?></td>
      <td><?php echo $association_survey->getCompensationTypeOther() ?></td>
      <td><?php echo $association_survey->getTraining() ?></td>
      <td><?php echo $association_survey->getTrainingType() ?></td>
      <td><?php echo $association_survey->getTrainingTypeOther() ?></td>
      <td><?php echo $association_survey->getDonationsString() ?></td>
      <td><?php echo $association_survey->getMethod() ?></td>
      <td><?php echo $association_survey->getUtilization() ?></td>
      <td><?php echo $association_survey->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
