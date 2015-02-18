<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('activity_survey/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?volunteer_survey_id='.$form->getObject()->getVolunteerSurveyId().'&association_survey_id='.$form->getObject()->getAssociationSurveyId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('activity_survey/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'activity_survey/delete?volunteer_survey_id='.$form->getObject()->getVolunteerSurveyId().'&association_survey_id='.$form->getObject()->getAssociationSurveyId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
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
        <th><?php echo $form['field15']->renderLabel() ?></th>
        <td>
          <?php echo $form['field15']->renderError() ?>
          <?php echo $form['field15'] ?>
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
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['root_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['root_id']->renderError() ?>
          <?php echo $form['root_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['lft']->renderLabel() ?></th>
        <td>
          <?php echo $form['lft']->renderError() ?>
          <?php echo $form['lft'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rgt']->renderLabel() ?></th>
        <td>
          <?php echo $form['rgt']->renderError() ?>
          <?php echo $form['rgt'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['level']->renderLabel() ?></th>
        <td>
          <?php echo $form['level']->renderError() ?>
          <?php echo $form['level'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
