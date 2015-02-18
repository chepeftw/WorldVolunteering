<?php include_partial('association/breadcrumb3', array('association' => $association, 'type' => 4)) ?>

<h1>Galeria de <?php echo $association->getName() ?></h1>
<br>

<?php include_partial('association/menu', array('association' => $association)) ?>

<a href="<?php echo url_for('association_gallery_one', $prev) ?>">Anterior</a> 
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php echo url_for('association_gallery_one', $next) ?>">Siguiente</a>
<br>

<?php echo image_tag( '/uploads/photos/'.$photo->getLocation() ) ?> <br>
		
<?php if ($sf_user->isAuthenticated()): ?>
	<?php if( $association->isMine( $sf_user->getGuardUser()->getId() ) ): ?>
		<?php echo link_to('Delete', 'photo/delete?id='.$photo->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
	<?php endif; ?>
<?php endif; ?>
