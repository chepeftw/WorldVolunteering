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
	<br><br>
</div>
<?php endforeach; ?>
<?php endif; ?>
