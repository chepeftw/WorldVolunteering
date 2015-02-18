<?php include_partial('association/breadcrumb0') ?>

<div class="innerblock-content">
	<h4><?php echo $news->getTitle() ?></h4>
	
	<div class="info_assoc">
	<?php echo $news->getDescription() ?>
	</div>
	
	<div class="cleanse"></div>
	<br><br>
</div>

<?php echo image_tag( '/uploads/news/'.$news->getPicture() ) ?>
