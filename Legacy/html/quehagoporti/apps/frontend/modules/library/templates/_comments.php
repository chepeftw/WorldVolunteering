<?php use_helper('Text', 'Date') ?>


<?php if( $error_library ): ?>
<div class="error_div">Hubo un problema con su mensaje, porfavor intente nuevemante.</div>
<?php endif; ?>
<?php if( $error_name ): ?>
<div class="error_div">El nombre es obligatorio.</div>
<?php endif; ?>
<?php if( $error_comment ): ?>
<div class="error_div">El comentario es obligatorio.</div>
<?php endif; ?>
<?php if( $error_captcha ): ?>
<div class="error_div">El captcha es invalido.</div>
<?php endif; ?>


<?php if ($comments): ?>
  <p><?php echo count( $comments ) ?> comentario<?php if (count($comments) != 1) : ?>s<?php endif; ?>.</p><br />
  
  <?php if( count( $comments ) >= 1 ): ?>
  <table>  
  <?php foreach ($comments as $comment): ?>
	  <tr>
		  <td width="350px">
			  <em><b>Comentado por <?php echo $comment->getName() ?></b> el <?php echo date('d-m-Y', strtotime( $comment->getCreatedAt() ) ); ?></em><br />
			  <?php echo simple_format_text($comment->getComment()) ?>
		  </td>
	  </tr>
  <?php endforeach; ?>
  </table>
  <?php endif; ?>
  
<?php endif; ?>
