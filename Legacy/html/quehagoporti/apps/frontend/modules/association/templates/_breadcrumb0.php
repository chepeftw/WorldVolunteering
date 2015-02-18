<p>
	<a href="http://www.guatevoluntaria.org">Guatevoluntaria.org</a> >>
	<?php if( $type == 1 ): ?>
		<a href="<?php echo url_for('association/index') ?>">Voluntariados</a>
	<?php elseif( $type == 2 ): ?>
		<a href="<?php echo url_for('library/index') ?>">Cultura del Voluntariado</a>
	<?php elseif( $type == 3 ): ?>
		<a href="<?php echo url_for('tellus/index') ?>">Contactanos</a>
	<?php endif; ?>
</p>
