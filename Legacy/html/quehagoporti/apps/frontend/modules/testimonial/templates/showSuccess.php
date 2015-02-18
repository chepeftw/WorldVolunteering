<?php $association = $testimonial->getAssociation() ?>

<?php include_partial('association/breadcrumb3', array('association' => $association, 'object_generic' => $testimonial, 'type' => 3)) ?>

<h1>Testimonial de <?php echo $association->getName() ?></h1>
<br>

<?php include_partial('association/menu', array('association' => $association)) ?>

<div class="innerblock-content">
	
	<div class="info">
	<strong><?php echo $testimonial->getTitle() ?><br></strong>
	<br>
	<?php echo $testimonial->getDescription() ?>
	
	</div>
	
	<div class="functions">
	
	<?php if ( $sf_user->isAuthenticated() && $testimonial->isMine( $sf_user->getGuardUser()->getId() ) ): ?>
		<?php echo link_to('Borrar', 'activity/delete?id='.$testimonial->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?')) ?>
	<?php endif; ?>
	</div>
	
	<div class="cleanse"></div>
</div>

<br>

<?php echo image_tag( '/uploads/testimonials/'.$testimonial->getPicture(), 'alt='.$association->getName().' title='.$association->getName().' class="center"' ) ?>
