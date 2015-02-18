<h1><?php echo $form['name']->getValue() ?>  (Paso 3/3)</h1>

<p>Porfavor cuentanos que puede hacer la gente para tu asociacion.</p>

<form action="<?php echo url_for('association/create3?id='.$form->getObject()->getId()) ?>" method="post">
  <table>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['requirements']->renderLabel() ?></th>
        <td>
          <?php echo $form['requirements']->renderError() ?>
          <?php echo $form['requirements'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['commitment']->renderLabel() ?></th>
        <td>
          <?php echo $form['commitment']->renderError() ?>
          <?php echo $form['commitment'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['donations']->renderLabel() ?></th>
        <td>
          <?php echo $form['donations']->renderError() ?>
          <?php echo $form['donations'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['method']->renderLabel() ?></th>
        <td>
          <?php echo $form['method']->renderError() ?>
          <?php echo $form['method'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['utilization']->renderLabel() ?></th>
        <td>
          <?php echo $form['utilization']->renderError() ?>
          <?php echo $form['utilization'] ?>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('my_association') ?>">Regresar</a>
          <input type="submit" value="Paso4" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>

