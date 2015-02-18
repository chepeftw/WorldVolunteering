<?php include_partial('association/breadcrumb0', array('type' => 2)) ?>

<h1>Cultura del Voluntariado</h1>

<br />
<h1>Los recomendados</h1>
<?php include_partial('list', array('libraries' => $libraries_top )) ?>

<br />
<br />
<h1>Los mas recientes</h1>
<?php $libraries = $pager->getResults() ?>

<?php if( count( $libraries ) ): ?>
<br /><br />
<?php foreach ($libraries as $library): ?>
<div class="innerblock-content">
	<h4><?php echo $library->getTitle() ?></h4>
	
	<div class="pic">
	<?php echo image_tag( '/uploads/media_picture_thumbnail/'.$library->getPicture() ) ?>
	</div>
	
	<div class="info_assoc">
	<?php echo substr( $library->getDescription(), 0, 250 ) ?>
	<?php if( strlen( $library->getDescription() ) > 250 ) echo '...' ?>
	<br>
	<a href="<?php echo url_for('library_user', $library) ?>">Mas informacion</a>
	</div>
	
	<div class="cleanse"></div>
	<br>
	<br>
</div>
<?php endforeach; ?>

<?php if ($pager->haveToPaginate()): ?>

  <div class="pagination">
    <a href="<?php echo url_for('@libraries') ?>?pagina=1">
      <img id="img-pagination" src="<?php echo image_path('icons/first.png') ?>" alt="Primera pagina" title="Primera pagina" />
    </a>
 
    <a href="<?php echo url_for('@libraries') ?>?pagina=<?php echo $pager->getPreviousPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/previous.png') ?>" alt="Pagina anterior" title="Pagina anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('@libraries') ?>?pagina=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('@libraries') ?>?pagina=<?php echo $pager->getNextPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/next.png') ?>" alt="Pagina siguiente" title="Pagina siguiente" />
    </a>
 
    <a href="<?php echo url_for('@libraries') ?>?pagina=<?php echo $pager->getLastPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/last.png') ?>" alt="Ultima pagina" title="Ultima pagina" />
    </a>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> archivos
    - pagina <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
</div>

<?php endif; ?>
