<p>
	<a href="http://www.guatevoluntaria.org">Guatevoluntaria.org</a> >>
	
	<?php if( $type == 1 ): ?>
		<a href="<?php echo url_for('association/index') ?>">Voluntariados</a> >>
		<a href="<?php echo url_for('association_user', $object_generic) ?>"><?php echo $object_generic->getName() ?></a>
	<?php elseif( $type == 2 ): ?>
		<a href="<?php echo url_for('library/index') ?>">Cultura del Voluntariado</a> >>
		<a href="<?php echo url_for('library_user', $object_generic) ?>"><?php echo $object_generic->getTitle() ?></a>
	<?php endif; ?>
</p>
