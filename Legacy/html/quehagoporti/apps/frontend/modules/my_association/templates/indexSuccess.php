<table id="table-title">
	<tr>
		<td><h1>Mi Voluntariado</h1></td>
		
		<?php if( !$sf_user->getGuardUser()->hasAssociation() ): ?>
		<td><a id="new-link" href="<?php echo url_for('association/new') ?>">Nuevo <img id="img-pagination" src="<?php echo image_path('icons/new.png') ?>" /> </a></td>
		<?php endif; ?>
	</tr>
</table>

<br>

<?php include_partial('association/list', array('associations' => $associations)) ?>
