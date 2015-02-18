<?php slot('facebook_tags') ?>
<meta property="og:title" content="<?php echo $sf_response->getTitle() ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo $sf_request->getUri() ?>" />
<meta property="og:image" content="<?php echo public_path( '/uploads/media_picture_thumbnail/'.$library->getPicture(), true ) ?>" />
<meta property="og:site_name" content="<?php echo $sf_request->getHost() ?>" />
<?php
$metaTags = $sf_response->getMetas();
$metaDesc = $metaTags['description'];
echo '<meta property="og:descripction" content="'.$metaDesc.'" />'
?>
<meta property="fb:admins" content="638170293" />
<link rel="image_src" href="<?php echo public_path( '/uploads/media_picture_thumbnail/'.$library->getPicture(), true ) ?>" />
<?php end_slot() ?>

<?php include_partial('association/breadcrumb1', array('object_generic' => $library, 'type' => 2)) ?>

<script type="text/javascript">
function recommend()
{	
	$( ("#listener") ).hide();$( ("#loader") ).show();
	$.ajax({
		type: 'GET',
		url: '<?php echo url_for('library/recommend') ?>',
		data: { id: <?php echo $library->getId() ?> },
		success: function(html){
			$( ("#listener") ).html(html);
			$( ("#loader") ).hide();
			$( ("#listener") ).show();
	    },
		dataType: 'html'
	});
}
</script>

<div class="innerblock-content">
	<h4><?php echo $library->getTitle() ?></h4>
	
	<div class="pic">
	<?php echo image_tag( '/uploads/media_picture_thumbnail/'.$library->getPicture() ) ?>
	</div>
	
	<div class="info_assoc">
	<?php echo $library->getDescription() ?>
	<br>
	<?php setlocale(LC_ALL,'es_VE'); ?>
	Publicado el <?php echo date('d-m-Y', strtotime( $library->getCreatedAt() ) ); ?>
	<br>
	</div>
	
	<div class="info_assoc">
	<a href="<?php echo public_path( '/uploads/media/'.$library->getMedia() ) ?>" target="_blank"> Descargar archivo! </a>
	<br>
	</div>
	
	<div class="cleanse"></div>
	<br><br>
</div>

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

<div class="cleanse"></div>
<br><br>						

<hr />

<a href="<?php echo url_for('library/index') ?>">Regresar</a>

<br /><br />
<div id="listener">
<?php if( $library->hasThisIpVoted( $sf_request->getRemoteAddress() ) ): ?>
	<?php echo $library->getRating() ?> Recomendacion<?php if ($library->getRating() > 1) echo 'es' ?>.
<?php else: ?>
	<a href="#" onClick="recommend();return false;">Lo recomiendo</a>
<?php endif; ?>
</div>
<div id="loader" style="display:none;"><img src="<?php echo image_path("ajax-loader.gif")?>" /></div>

<hr />
<br />

<script type="text/javascript">
function sendcomment()
{
	$( ("#loadercomment") ).show();
	var comment = $("#comment_comment").val();
	comment = comment.replace( /[&]/g, ";amp" );
	comment = comment.replace( /[=]/g, ";eq" );
	comment = comment.replace( /[?]/g, ";ques" );
	
	$.ajax({
		type: 'POST',
		url: '<?php echo url_for('library/comment') ?>',
		data: { id: $("#comment_library_id").val(), nam: $("#comment_name").val(), com: comment, rcf: $("#recaptcha_challenge_field").val(), rrf: $("#recaptcha_response_field").val() },
		success: function(html){
			$("#listenercomment").html(html);
			$( ("#loadercomment") ).hide();
	    },
		dataType: 'html'
	});
	
	$("#comment_comment").val("");
	$("#comment_name").val("");
}
</script>

<div id="listenercomment">
	<?php include_partial('comments', array('comments' => $comments, 'error_library' => 0, 'error_name' => 0, 'error_comment' => 0, 'error_captcha' => 0 )) ?>
</div>

<div id="loadercomment" style="display:none;"><img src="<?php echo image_path("ajax-loader.gif")?>" /></div>

<form action="" method="post">
  <table>
    <tbody>
      <tr>
        <th><label>Nombre</label></th>
        <td>
          <input type="input" id="comment_name">
        </td>
      </tr>
      <tr>
        <th><label>Comentario</label></th>
        <td>
          <textarea cols="50" rows="5" id="comment_comment"></textarea>
          <input type="hidden" value="<?php echo $library->getId() ?>" id="comment_library_id">
        </td>
      </tr>
      <tr>
        <th><label>Captcha</label></th>
        <td>
		<?php
			$captcha = new sfWidgetFormReCaptcha(array( 'public_key' => sfConfig::get('app_recaptcha_public_key') ));
			echo $captcha->render('comment_captcha');
		?>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="button" onclick="javascript:sendcomment();return false;" value="Comentar" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>
