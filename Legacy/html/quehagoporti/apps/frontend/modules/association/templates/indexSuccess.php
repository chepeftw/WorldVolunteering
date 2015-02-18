<?php include_partial('breadcrumb0', array('type' => 1)) ?>

<table id="table-title">
	<tr>
		<td><h1>Voluntariados</h1></td>
	</tr>
</table>

<br>
<?php include_partial('list', array('associations' => $pager->getResults())) ?>

<?php if ($pager->haveToPaginate()): ?>

  <div class="pagination">
    <a href="<?php echo url_for('@association') ?>?pagina=1">
      <img id="img-pagination" src="<?php echo image_path('icons/first.png') ?>" alt="Primera pagina" title="Primera pagina" />
    </a>
 
    <a href="<?php echo url_for('@association') ?>?pagina=<?php echo $pager->getPreviousPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/previous.png') ?>" alt="Pagina anterior" title="Pagina anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('@association') ?>?pagina=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('@association') ?>?pagina=<?php echo $pager->getNextPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/next.png') ?>" alt="Pagina siguiente" title="Pagina siguiente" />
    </a>
 
    <a href="<?php echo url_for('@association') ?>?pagina=<?php echo $pager->getLastPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/last.png') ?>" alt="Ultima pagina" title="Ultima pagina" />
    </a>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> asociaciones
    - pagina <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
</div>

