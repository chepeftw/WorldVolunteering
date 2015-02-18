<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <?php include_slot('facebook_tags') ?>
  </head>
  
	<body>
	
	<div id="wrapper">
		<div id="menu">
			<ul>
				<li><?php echo link_to('Inicio', '@homepage') ?></li>
			</ul>
		</div>
		<!-- end #menu -->
		<div id="header">
			<div id="logo_up">
				<h1><?php echo image_tag( 'flags/guatemala.png' ) ?></h1>
			</div>
			<div id="logo">
				
			</div>
		</div>
		<!-- end #header -->
		
		
		
		<div id="page">
		<div id="page-bgtop">
		
	<!-- User Flash -->
	<?php if ($sf_user->hasFlash('notice')): ?>
		<div class="flash_notice"><p id="alert"><font color="green"><?php echo $sf_user->getFlash('notice') ?></font></p></div>
	<?php endif; ?>

	<?php if ($sf_user->hasFlash('error')): ?>
		<div class="flash_notice"><p id="alert"><font color="red"><?php echo $sf_user->getFlash('error') ?></font></p></div>
	<?php endif; ?>
	<!-- End User Flash -->
		
		<div id="page-bgbtm">
			<div id="content">
				<?php echo $sf_content ?>
			<div style="clear: both;">&nbsp;</div>
			</div>
			<!-- end #content -->
			
			
			<div style="clear: both;">&nbsp;</div>
		</div>
		</div>
		</div>
		<!-- end #page -->
	</div>
		<div id="footer">
			<p>Copyright (c) 2011 guatevoluntaria.org. Derechos Reservados. JAAA.</p>
		</div>
		<!-- end #footer -->
		
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23590276-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</body>
  
</html>
