<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
	<link rel="shortcut icon" href="<?php echo image_path('favicon.png',true) ?>" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
	<?php if (has_slot('facebook_tags')): ?>
	  <?php include_slot('facebook_tags') ?>
	<?php else: ?>
<meta property="og:title" content="<?php echo $sf_response->getTitle() ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo $sf_request->getUri() ?>" />
<meta property="og:image" content="<?php echo public_path( '/images/logo.png', true ) ?>" />
<meta property="og:site_name" content="<?php echo $sf_request->getHost() ?>" />
<?php
$metaTags = $sf_response->getMetas();
$metaDesc = $metaTags['description'];
echo '<meta property="og:descripction" content="'.$metaDesc.'" />'
?>
<meta property="fb:admins" content="638170293" />
<link rel="image_src" href="<?php echo public_path( '/images/logo.png', true ) ?>" />
	<?php endif; ?>
    
<script type="text/javascript">
window.google_analytics_uacct = "UA-23590276-1";
</script>

    
  </head>
  
	<body>
	
	<div id="wrapper">
		<div id="menu">
			<ul>
				<?php $i = 1; ?>
				<?php $j = 14; ?>
				<li><a href="<?php echo url_for('@homepage') ?>"><img src="<?php echo image_path('munequitos/'.mt_rand($i, $j).'.png') ?>" />Inicio</a></li>
				<li id="special_menu_item"><a href="<?php echo url_for('@association') ?>"><img src="<?php echo image_path('munequitos/'.mt_rand($i, $j).'.png') ?>" />Voluntariados</a></li>
				<li><a href="<?php echo url_for('@libraries') ?>"><img src="<?php echo image_path('munequitos/'.mt_rand($i, $j).'.png') ?>" /> Cultura</a></li>
				<li><a href="<?php echo url_for('@contactus') ?>"><img src="<?php echo image_path('munequitos/'.mt_rand($i, $j).'.png') ?>" /> Contactanos</a></li>
				<li><a href="<?php echo url_for('@sf_guard_signin') ?>"><img src="<?php echo image_path('munequitos/'.mt_rand($i, $j).'.png') ?>" /> Ingresa</a></li>
			</ul>
		</div>
		<!-- end #menu -->
		
		<div class="yellow_line">&nbsp;</div>
		
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
			
			
			
			<div id="sidebar">
				<ul>
					
<!-- Users -->					
					<li>
						<?php if ($sf_user->isAuthenticated()): ?>
						<div style="border: 5px solid #f0b64f;">
							<br>
							<h2>Bienvenido</h2>
							<p style="color:#000;">
							<?php echo $sf_user->getGuardUser()->getUsername() ?>
							<br>
							<?php echo link_to('Mi Asociacion', '@my_association') ?>
							&nbsp;|&nbsp;
							<?php echo link_to('Salir', 'sfGuardAuth/signout') ?>
							</p>
						</div>
						<br>
						<?php endif; ?>
					</li>

<!-- Follow Us -->
					<li>
						Siguenos en &nbsp;<a href="https://www.facebook.com/CVGuate" target="_blank"><img src="<?php echo image_path('Facebook.png') ?>" /></a> &nbsp; <a href="http://www.twitter.com/CVGuate" target="_blank"><img src="<?php echo image_path('Twitter.png') ?>" /></a>
						<hr>
					</li>					

<!-- Social Widgets -->					
					<li style="height:80px;">
		
						<div style="width:280px;">
						
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) {return;}
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<fb:like href="www.guatevoluntaria.org" send="false" layout="box_count" width="50" show_faces="false"></fb:like>
						&nbsp;&nbsp;
						<g:plusone size="tall"></g:plusone>
						&nbsp;&nbsp;
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
						
					</li>

<!-- News -->
					<li>
						<?php include_component('home', 'news') ?>
					</li>
					
<!-- Search Form -->					
					<li>
						<div id="search" >
						<form method="get" action="<?php echo url_for('association/search') ?>">
							<div>
								<input type="text" name="query" id="search-text" value="" />
								<input type="submit" id="search-submit" value="Buscar" />
							</div>
						</form>
						</div>
						<div style="clear: both;">&nbsp;</div>
					</li>
					
					
<!-- Ads -->
					<li style="width:inherit;height:600px;">
						<div class="center">
						<script type="text/javascript"><!--
						google_ad_client = "ca-pub-4268384308225453";
						/* Guatevoluntaria Side Panel */
						google_ad_slot = "5627625726";
						google_ad_width = 160;
						google_ad_height = 600;
						//-->
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>
						</div>
					</li>



<!-- Users 
					<li>
						<?php if (!$sf_user->isAuthenticated()): ?>
						<br>
						<h2>Usuarios</h2>
						<p>
						<?php echo link_to('Iniciar Sesion', '@sf_guard_signin') ?>
						
						</p>
						<?php endif; ?>
					</li>
-->
					
				</ul>
			</div>
			<!-- end #sidebar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
		</div>
		</div>
		<!-- end #page -->
	</div>
	
	<div class="yellow_line">&nbsp;</div>
	
		<div id="footer">
			<p><strong>Copyright <?php echo date('Y') ?> &copy; www.guatevoluntaria.org. Derechos Reservados. JAAA.</strong></p>
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
