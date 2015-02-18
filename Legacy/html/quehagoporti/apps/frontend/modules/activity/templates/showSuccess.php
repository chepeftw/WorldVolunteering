<?php $association = $activity->getAssociation() ?>

<?php include_partial('association/breadcrumb3', array('association' => $association, 'object_generic' => $activity, 'type' => $type)) ?>

<h1>Actividad de <?php echo $association->getName() ?></h1>
<br>

<?php include_partial('association/menu', array('association' => $association)) ?>

<?php $association = $activity->getAssociation() ?>
<div class="innerblock-content">
	
	<div class="pic">
	<?php echo image_tag( '/uploads/thumbnail/'.$association->getLogo(), 'alt='.$association->getName().' title='.$association->getName() ) ?>
	</div>
	
	<div class="info">
	<strong><?php echo $activity->getTitle() ?><br></strong>
	<br>
	<strong><?php echo $activity->getPlace() ?><br></strong>
	<br>
	<?php echo $activity->getDescription() ?>
	
	</div>
	
	<div class="functions">
	<strong><?php echo $activity->getDateSpanish() ?></strong><br>
	
	<?php if ( $sf_user->isAuthenticated() && $activity->isMine( $sf_user->getGuardUser()->getId() ) ): ?>
		<?php echo link_to('Borrar', 'activity/delete?id='.$activity->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?')) ?>
	<?php endif; ?>
	</div>
	
	<div class="cleanse"></div>
</div>

<br>

<?php echo image_tag( '/uploads/activity/'.$activity->getPicture(), 'alt='.$association->getName().' title='.$association->getName().' class="center"' ) ?>
