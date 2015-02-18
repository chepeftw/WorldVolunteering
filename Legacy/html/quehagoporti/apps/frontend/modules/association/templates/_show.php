	<div class="info_show" <?php echo ($width_property)?'style="width:450px"':'' ?>>
	
	<strong><?php echo $association->getCountry().' - '.$association->getDepartment().' - '.$association->getTown() ?><br></strong>
	
	<strong><a href="mailto:<?php echo $association->getEmail() ?>"><?php echo $association->getEmail() ?></a><br></strong>
	
	<strong><?php echo $association->getPhone1().'        '.$association->getPhone2() ?><br></strong>
	
	<?php if( trim( $association->getAddress() ) != '' ): ?>
		<?php echo $association->getAddress() ?><br>
	<?php endif; ?>
	
	<?php if( trim( $association->getWebsite() ) != '' ): ?>
		<a href="http://<?php echo $association->getWebsite() ?>"><?php echo $association->getWebsite() ?></a><br>
	<?php endif; ?>
	
	Fundada en <?php echo $association->getFoundedSpanish() ?><br>
	</div>
	
	<?php if( $association->getFacebookPage() != '' && $association->getTwitterUser() != '' ): ?>
	<div class="functions-show">
	<?php if( $association->getFacebookPage() != '' ): ?>
	<h4>Facebook</h4>
		&nbsp;&nbsp; <?php echo $association->getFacebookPage() ?><br>
	<?php endif; ?>
	
	<?php if( $association->getTwitterUser() != '' ): ?>
	<h4>Twitter</h4>
		&nbsp;&nbsp; <?php echo $association->getTwitterUser() ?><br>
	<?php endif; ?>
	</div>
	<?php endif; ?>
