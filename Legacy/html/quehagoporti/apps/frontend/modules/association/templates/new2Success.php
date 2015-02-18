<h1><?php echo $form['name']->getValue() ?>  (Paso 2/3)</h1>

<p>Porfavor cuentanos un poco acerca de tu asociacion.</p>

<form action="<?php echo url_for('association/create2?id='.$form->getObject()->getId()) ?>" method="post">
  <table>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['about_us']->renderLabel() ?></th>
        <td>
          <?php echo $form['about_us']->renderError() ?>
          <?php echo $form['about_us'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['what_we_do']->renderLabel() ?></th>
        <td>
          <?php echo $form['what_we_do']->renderError() ?>
          <?php echo $form['what_we_do'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['history']->renderLabel() ?></th>
        <td>
          <?php echo $form['history']->renderError() ?>
          <?php echo $form['history'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['vision']->renderLabel() ?></th>
        <td>
          <?php echo $form['vision']->renderError() ?>
          <?php echo $form['vision'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mision']->renderLabel() ?></th>
        <td>
          <?php echo $form['mision']->renderError() ?>
          <?php echo $form['mision'] ?>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('my_association') ?>">Regresar</a>
          <input type="submit" value="Paso3" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>

<?php include_component('taggableComplete','tagWidget', array('object' => $form->getObject())) ?>
