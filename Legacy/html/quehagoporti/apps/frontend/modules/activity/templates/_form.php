<h2><strong>Nueva Actividad:</strong></h2>
Ingrese la informacion necesaria para que la gente pueda saber de su actividad.</p>

<form action="<?php echo url_for('activity/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date']->renderLabel() ?></th>
        <td>
          <?php echo $form['date']->renderError() ?>
          <?php echo $form['date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['place']->renderLabel() ?></th>
        <td>
          <?php echo $form['place']->renderError() ?>
          <?php echo $form['place'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['picture']->renderLabel() ?></th>
        <td>
          <?php echo $form['picture']->renderError() ?>
          <?php echo $form['picture'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['captcha']->renderLabel() ?></th>
        <td>
          <?php echo $form['captcha']->renderError() ?>
          <?php echo $form['captcha'] ?>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input  type="hidden" value="<?php echo $association->getId() ?>" name="activity[association_id]" />
          <input type="submit" value="Agregar" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>
