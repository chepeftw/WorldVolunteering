<?php slot('facebook_tags') ?>
<meta property="og:title" content="<?php echo $sf_response->getTitle() ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo $sf_request->getUri() ?>" />
<meta property="og:image" content="<?php echo public_path( '/uploads/thumbnail/'.$association->getLogo(), true ) ?>" />
<meta property="og:site_name" content="<?php echo $sf_request->getHost() ?>" />
<?php
$metaTags = $sf_response->getMetas();
$metaDesc = $metaTags['description'];
echo '<meta property="og:descripction" content="'.$metaDesc.'" />'
?>
<meta property="fb:admins" content="638170293" />
<link rel="image_src" href="<?php echo public_path( '/uploads/thumbnail/'.$association->getLogo(), true ) ?>" />
<?php end_slot() ?>

<?php include_partial('breadcrumb1', array('object_generic' => $association, 'type' => 1)) ?>

<h1>
	<?php echo $association->getName() ?>
	<?php if ($sf_user->isAuthenticated() && $association->isMine( $sf_user->getGuardUser()->getId() )): ?>
		<a id="new-link" style="padding:5px;border: 2px solid #f0b64f;" href="<?php echo url_for('association/edit?id='.$association->getId()) ?>">Editar</a>
	<?php endif; ?>
</h1>
<br>
<br>

<?php include_partial('menu', array('association' => $association)) ?>

<div class="innerblock-content">	

	<?php include_partial('show', array('association' => $association, 'width_property' => 0)) ?>
	
	<div class="functions-show">
		
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) {return;}
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<fb:like href="<?php echo $sf_request->getUri() ?>" send="false" layout="box_count" width="50" show_faces="true"></fb:like>
		&nbsp;&nbsp;&nbsp;
		<g:plusone size="tall"></g:plusone>
		&nbsp;&nbsp;&nbsp;
		<a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>

		<!-- Place this render call where appropriate -->
		<script type="text/javascript">
		  (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>

	</div>
	
</div>


<div class="innerblock-content">
	<div class="info_show">

	<p>
	<strong>Quienes somos?</strong><br>
	<?php echo $association->getAboutUs() ?>
	</p>

	<?php if( $association->getWhatWeDo() != '' || $association->getMision() != '' || $association->getVision() != '' || $association->getHistory() != '' ): ?>
		<p><strong>Informacion General</strong>&nbsp;&nbsp;&nbsp;<a href="#" id="info_show">[+]</a></p>
		
		<div id="info" style="display:none">
		<?php if( $association->getWhatWeDo() != '' ): ?>
		<p>
		<strong>Que hacemos?</strong><br>
		<?php echo $association->getWhatWeDo() ?>
		</p>
		<?php endif; ?>
		
		<?php if( $association->getMision() != '' ): ?>
		<p>
		<strong>Mision</strong><br>
		<?php echo $association->getMision() ?>
		</p>
		<?php endif; ?>

		<?php if( $association->getVision() != '' ): ?>
		<p>
		<strong>Vision</strong><br>
		<?php echo $association->getVision() ?>
		</p>
		<?php endif; ?>
		
		<?php if( $association->getHistory() != '' ): ?>
		<p>
		<strong>Historia</strong><br>
		<?php echo $association->getHistory() ?>
		</p>
		<?php endif; ?>
		</div>
	<?php endif; ?>
	
	
	<?php if( $association->getRequirements() != '' || $association->getCommitment() != '' ): ?>
		<p><strong>Voluntarios</strong>&nbsp;&nbsp;&nbsp;<a href="#" id="volunteer_show">[+]</a></p>	
		
		<div id="volunteer" style="display:none">
		<?php if( $association->getRequirements() != '' ): ?>
		<p>
		<strong>Requerimientos del Voluntario?</strong>&nbsp;&nbsp;&nbsp;<br>
		<?php echo $association->getRequirements() ?>
		</p>
		<?php endif; ?>

		<?php if( $association->getCommitment() != '' ): ?>
		<p>
		<strong>Compromiso del Voluntario?</strong>&nbsp;&nbsp;&nbsp;<br>
		<?php echo $association->getCommitment() ?>
		</p>
		<?php endif; ?>
		</div>
	<?php endif; ?>
	
	
	<?php if( $association->getDonations() != '' || $association->getMethod() != '' || $association->getUtilization() != '' ): ?>
		<p><strong>Donaciones</strong>&nbsp;&nbsp;&nbsp;<a href="#" id="donations_show">[+]</a></p>

		<div id="donations" style="display:none">
		<?php if( $association->getDonations() != '' ): ?>
		<p>
		<strong>Acepta donaciones?</strong><br>
		<?php echo ($association->getDonations())?'Si':'No' ?>
		</p>
		<?php endif; ?>

		<?php if( $association->getMethod() != '' ): ?>
		<p>
		<strong>Metodologia para donaciones</strong><br>
		<?php echo $association->getMethod() ?>
		</p>
		<?php endif; ?>

		<?php if( $association->getUtilization() != '' ): ?>
		<p>
		<strong>Uso de las donaciones</strong><br>
		<?php echo $association->getUtilization() ?>
		</p>
		<?php endif; ?>
		</div>
	<?php endif; ?>
	
	</div>
	
	<div class="cleanse"></div>
</div>

<br>

<?php echo image_tag( '/uploads/logos/'.$association->getLogo(), 'alt='.$association->getName().' title='.$association->getName().' class="center"' ) ?>

<script>
$('#info_show').click(function () { $("#info").toggle('middle'); return false; });
$('#volunteer_show').click(function () { $("#volunteer").toggle('middle'); return false; });
$('#donations_show').click(function () { $("#donations").toggle('middle'); return false; });
</script>
