<?php include_partial('association/breadcrumb2', array('association' => $association, 'type' => 4)) ?>

<h1>Galeria de <?php echo $association->getName() ?></h1>
<br>

<?php include_partial('association/menu', array('association' => $association)) ?>

<div class="innerblock-content">

	<div class="pic">
	<?php echo image_tag( '/uploads/thumbnail/'.$association->getLogo(), 'alt='.$association->getName().' title='.$association->getName() ) ?>
	</div>

	<?php include_partial('association/show', array('association' => $association, 'width_property' => 1)) ?>
	
</div>

<div class="cleanse"></div>
<br>

<?php if ($sf_user->isAuthenticated()): ?>
<?php $is_association_mine = $association->isMine( $sf_user->getGuardUser()->getId() ); ?>

	<?php if( $is_association_mine ): ?>
		<?php if( $association->canHaveMorePhotos() ): ?>
		<br>
		<div style="text-align:right; border: 2px solid #f0b64f;">
		<?php include_partial('form', array('form' => $form, 'association' => $association)) ?>
		</div>
		<?php else: ?>
		<p>Ya llego a su limite de 20 imagenes.</p>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>

<div class="cleanse"></div>
<br>
<br>

<?php if( count( $photos ) > 0 ): ?>
<br/><br/>

<table>
<?php $i = 0; ?>
<?php foreach ($photos as $photo): ?>
	<?php if( $i == 0 ): ?>
	<tr>
	<?php endif; ?>
		<td>
		<a href="<?php echo url_for('association_gallery_one', $photo) ?>"><?php echo image_tag( '/uploads/photos_thumbnail/'.$photo->getLocation() ) ?></a> <br>
		
		<?php if ($sf_user->isAuthenticated()): ?>
			<?php if( $is_association_mine ): ?>
				<?php echo link_to('Borrar', 'photo/delete?id='.$photo->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?')) ?>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php $i++; ?>
		</td>
	<?php if( $i == 5 ): ?>
	</tr>
	<?php $i = 0; ?>
	<?php endif; ?>
<?php endforeach; ?>
</table>
<?php else: ?>
<br>
<br>
<p> &nbsp;&nbsp;&nbsp; <strong>No hay imagenes por el momento.</strong></p>

<?php endif; ?>
