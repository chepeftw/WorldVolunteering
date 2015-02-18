<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>    
<?php if ($sf_user->isSuperAdmin()): ?>	
	<table>
		<tr>
			<td><?php echo link_to('Users', 'sfGuardUser/index') ?></td>
			<td><?php echo link_to('Association', 'association/index') ?></td>
			<td><?php echo link_to('Activity', 'activity/index') ?></td>
			<td><?php echo link_to('Testimonial', 'testimonial/index') ?></td>
			<td><?php echo link_to('Video', 'video/index') ?></td>
			<td><?php echo link_to('Photo', 'photo/index') ?></td>
			<td><?php echo link_to('Country', 'country/index') ?></td>
			<td><?php echo link_to('Department', 'department/index') ?></td>
			<td><?php echo link_to('News', 'news/index') ?></td>
			<td><?php echo link_to('Library', 'library/index') ?></td>
			<td><?php echo link_to('Logout', 'sfGuardAuth/signout') ?></td>
		</tr>
	</table>
	<br>
		<?php echo $sf_content ?>

	<?php else: ?>
	
		<?php if ($sf_user->isAuthenticated()): ?>
			<p> You are not a user super admin, sorry </p>
			<p><?php echo link_to('Logout', 'sfGuardAuth/signout') ?> <br /> </p>
		<?php endif; ?>

	<?php endif; ?>
	
	<?php if (!$sf_user->isAuthenticated()): ?>
	
	<?php echo $sf_content ?>
	
<?php endif; ?>    
  </body>
</html>
