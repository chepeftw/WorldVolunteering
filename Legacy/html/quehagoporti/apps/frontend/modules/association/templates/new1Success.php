<script type="text/javascript">
function getdepartments()
{
	$.ajax({
		type: 'GET',
		url: '<?php echo url_for('association/getdepartments') ?>',
		data: { id: $("#association_country_id").val() },
		success: function(html){
			$("#listener").html(html);
	    },
		dataType: 'html'
	});
}

</script>

<h1>Nueva Asociacion (Paso 1/3)</h1>

<p>Porfavor ingresa la informacion basica de tu asociacion. <br>
Los campos con * son obligatorios.</p>

<form action="<?php echo url_for('association/create1') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['phone1']->renderLabel() ?></th>
        <td>
          <?php echo $form['phone1']->renderError() ?>
          <?php echo $form['phone1'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['phone2']->renderLabel() ?></th>
        <td>
          <?php echo $form['phone2']->renderError() ?>
          <?php echo $form['phone2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['address']->renderLabel() ?></th>
        <td>
          <?php echo $form['address']->renderError() ?>
          <?php echo $form['address'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['website']->renderLabel() ?></th>
        <td>
          <?php echo $form['website']->renderError() ?>
          <?php echo $form['website'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['country_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['country_id']->renderError() ?>
          <?php echo $form['country_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['department_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['department_id']->renderError() ?>
          <div id="listener"><?php echo $form['department_id'] ?></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['town']->renderLabel() ?></th>
        <td>
          <?php echo $form['town']->renderError() ?>
          <?php echo $form['town'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['founded']->renderLabel() ?></th>
        <td>
          <?php echo $form['founded']->renderError() ?>
          <?php echo $form['founded'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['facebook_page']->renderLabel() ?></th>
        <td>
          <?php echo $form['facebook_page']->renderError() ?>
          <?php echo $form['facebook_page'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['facebook_group']->renderLabel() ?></th>
        <td>
          <?php echo $form['facebook_group']->renderError() ?>
          <?php echo $form['facebook_group'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['twitter_user']->renderLabel() ?></th>
        <td>
          <?php echo $form['twitter_user']->renderError() ?>
          <?php echo $form['twitter_user'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['partner1_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['partner1_name']->renderError() ?>
          <?php echo $form['partner1_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['partner1_mobile']->renderLabel() ?></th>
        <td>
          <?php echo $form['partner1_mobile']->renderError() ?>
          <?php echo $form['partner1_mobile'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['partner1_email']->renderLabel() ?></th>
        <td>
          <?php echo $form['partner1_email']->renderError() ?>
          <?php echo $form['partner1_email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['partner2_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['partner2_name']->renderError() ?>
          <?php echo $form['partner2_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['partner2_mobile']->renderLabel() ?></th>
        <td>
          <?php echo $form['partner2_mobile']->renderError() ?>
          <?php echo $form['partner2_mobile'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['partner2_email']->renderLabel() ?></th>
        <td>
          <?php echo $form['partner2_email']->renderError() ?>
          <?php echo $form['partner2_email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['logo']->renderLabel() ?></th>
        <td>
          <?php echo $form['logo']->renderError() ?>
          <?php echo $form['logo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['captcha']->renderLabel() ?></th>
        <td>
          <?php echo $form['captcha']->renderError() ?>
          <?php echo $form['captcha'] ?>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input  type="hidden" value="<?php echo $sf_user->getGuardUser()->getId() ?>" name="association[user_id]" />
          &nbsp;<a href="<?php echo url_for('my_association') ?>">Regresar</a>
          <input type="submit" value="Paso2" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>

