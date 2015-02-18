<?php foreach ($associations as $association): ?>
	<div class="innerblock-content">
		<h4><?php echo $association->getName() ?></h4>
		
		<div class="pic">
		<img src="<?php echo public_path( '/uploads/thumbnail/'.$association->getLogo(), true ) ?>" alt="<?php echo $association->getName() ?>" title="<?php echo $association->getName() ?>"/>
		</div>
		
		<div class="info_assoc">
		<?php echo $association->getAboutUs() ?>
		<br>
		<a title="<?php echo $association->getName() ?>" href="<?php echo url_for('association_user', $association, true) ?>">Mas informacion</a>
		</div>
		
		<div class="cleanse"></div>
		<br><br>
	</div>
<?php endforeach; ?>
