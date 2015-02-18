<select name="association[department_id]" id="association_department_id">

	<option value="0"></option>
	
<?php foreach($results as $result): ?>

	<option value="<?php echo $result->getId() ?>"><?php echo $result ?></option>
	
<?php endforeach; ?>

</select>
