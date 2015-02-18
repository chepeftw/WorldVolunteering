<p>
	<a href="http://www.guatevoluntaria.org">Guatevoluntaria.org</a> >>
	<a href="<?php echo url_for('association/index') ?>">Voluntariados</a> >>
	<a href="<?php echo url_for('association_user', $association) ?>"><?php echo $association->getName() ?></a> >>
	
	<?php if( $type == 1 ): ?>
		<a href="<?php echo url_for('association_activities', $association) ?>">Actividades</a> >>
		<a href="<?php echo url_for('activity_user', $object_generic) ?>"><?php echo $object_generic->getTitle() ?></a>
	<?php elseif( $type == 2 ): ?>
		<a href="<?php echo url_for('association_activities_history', $association) ?>">Historico</a> >>
		<a href="<?php echo url_for('activity_user2', $object_generic) ?>"><?php echo $object_generic->getTitle() ?></a>
	<?php elseif( $type == 3 ): ?>
		<a href="<?php echo url_for('association_testimonials', $association) ?>">Testimoniales</a> >>
		<a href="<?php echo url_for('testimonial_user', $object_generic) ?>"><?php echo $object_generic->getTitle() ?></a>
	<?php elseif( $type == 4 ): ?>
		<a href="<?php echo url_for('association_gallery', $association) ?>">Galeria</a>
	<?php elseif( $type == 5 ): ?>
		<a href="<?php echo url_for('association_video', $association) ?>">Videos</a>
	<?php endif; ?>
</p>
