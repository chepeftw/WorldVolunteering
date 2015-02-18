<?php include_partial('association/breadcrumb2', array('association' => $association, 'type' => 5)) ?>

<h1>Videos de <?php echo $association->getName() ?></h1>
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
		<br>
		<div style="padding:15px;border: 2px solid #f0b64f;">
		<?php include_partial('form', array('form' => $form, 'association' => $association)) ?>
		</div>
	<?php endif; ?>
	
<?php endif; ?>

<div class="cleanse"></div>
<br>
<br>

<?php if( count( $videos ) > 0 ): ?>
<br/><br/>

<table>

<?php foreach ($videos as $video): ?>

		<p style="text-align: center;"><iframe class="center" width="560" height="315" src="http://www.youtube.com/embed/<?php echo $video->getUrl() ?>" frameborder="0" allowfullscreen></iframe>
		
		<?php if ($sf_user->isAuthenticated()): ?>
			<?php if( $is_association_mine ): ?>
				<?php echo link_to('Borrar', 'video/delete?id='.$video->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?')) ?>
			<?php endif; ?>
		<?php endif; ?>
		</p>
		<br>
		<br>

<?php endforeach; ?>
</table>
<?php else: ?>
<br>
<br>
<p> &nbsp;&nbsp;&nbsp; <strong>No hay videos por el momento.</strong></p>

<?php endif; ?>
