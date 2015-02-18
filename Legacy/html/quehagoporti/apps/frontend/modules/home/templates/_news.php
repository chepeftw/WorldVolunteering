<?php if( count($news) > 0 ): ?>

<h2>Noticias</h2>
<?php foreach( $news as $new ): ?>
	<div class="innerblock-content">
		<h4><?php echo $new->getTitle() ?></h4>
		
		<div class="pic">
		<?php echo image_tag( '/uploads/news_thumbnail/'.$new->getPicture() ) ?>
		</div>
		
		<div class="info_assoc_news">
		<?php echo substr( $new->getDescription(), 0, 250 ) ?>
		<?php if( strlen( $new->getDescription() ) > 250 ) echo '...' ?>
		<br>
		<a href="<?php echo url_for('news_show', $new) ?>">Mas informacion</a>
		</div>
		
		<div class="cleanse"></div>
		<br><br>
	</div>
<?php endforeach; ?>

<?php endif; ?>
