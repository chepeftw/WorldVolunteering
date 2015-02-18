<?php include_partial('association/breadcrumb2', array('association' => $association, 'type' => 3)) ?>

<h1>Testimoniales de <?php echo $association->getName() ?></h1>
<br>

<?php include_partial('association/menu', array('association' => $association)) ?>

<div class="innerblock-content">

	<div class="pic">
	<?php echo image_tag( '/uploads/thumbnail/'.$association->getLogo() ) ?>
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

<?php if ( count( $pager->getResults() ) > 0 ): ?>

<?php foreach ($pager->getResults() as $testimonial): ?>
	<div class="innerblock-content">
		
		<div class="pic">
		<?php echo image_tag( '/uploads/testimonials_thumbnail/'.$testimonial->getPicture() ) ?>
		</div>
		
		<div class="info">
		<strong><?php echo $testimonial->getTitle() ?><br></strong>
		
		<?php echo substr( $testimonial->getDescription(), 0, 200 ) ?>
		<?php echo ( strlen( $testimonial->getDescription() ) > 200 )?' ...':'' ?>
		<br><br><br>
		</div>
		
		<div class="functions">
		<a href="<?php echo url_for('testimonial_user', $testimonial) ?>">Mas informacion</a>
		
		<?php if ( $sf_user->isAuthenticated() && $testimonial->isMine( $sf_user->getGuardUser()->getId() ) ): ?>
			<?php echo link_to('Borrar', 'testimonial/delete?id='.$testimonial->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?')) ?>
		<?php endif; ?>
		
		</div>
		<div class="cleanse"></div>
	</div>
	<br>
<?php endforeach; ?>

<?php else: ?>
<br>
<br>
<p> &nbsp;&nbsp;&nbsp; <strong>No hay testimoniales por el momento.</strong></p>

<?php endif; ?>


<?php if ($pager->haveToPaginate()): ?>

  <div class="pagination">
    <a href="<?php echo url_for('association_activities', $association) ?>?pagina=1">
      <img id="img-pagination" src="<?php echo image_path('icons/first.png') ?>" alt="Primera pagina" title="Primera pagina" />
    </a>
 
    <a href="<?php echo url_for('association_activities', $association) ?>?pagina=<?php echo $pager->getPreviousPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/previous.png') ?>" alt="Pagina anterior" title="Pagina anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('association_activities', $association) ?>?pagina=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('association_activities', $association) ?>?pagina=<?php echo $pager->getNextPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/next.png') ?>" alt="Pagina siguiente" title="Pagina siguiente" />
    </a>
 
    <a href="<?php echo url_for('association_activities', $association) ?>?pagina=<?php echo $pager->getLastPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/last.png') ?>" alt="Ultima pagina" title="Ultima pagina" />
    </a>
  </div>
 
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> actividades
    - pagina <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
</div>

<?php endif; ?>
