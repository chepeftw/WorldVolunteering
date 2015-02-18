<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<h2>Nuevo Video</h2>

<table>
	<tr>
		<td>
			Sube tus videos a YouTube y luego pega la direccion de tu video aca.
		</td>
		<td>
			<?php echo image_tag( 'video_help.jpg' ) ?>
		</td>
	</tr>
</table>

<form action="<?php echo url_for('video/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['url']->renderLabel() ?></th>
        <td>
          <?php echo $form['url']->renderError() ?>
          <?php echo $form['url'] ?>
        </td>
      </tr>
    </tbody>
	<tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input  type="hidden" value="<?php echo $association->getId() ?>" name="video[association_id]" />
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>
