<h1>Photos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Location</th>
      <th>Association</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($photos as $photo): ?>
    <tr>
      <td><a href="<?php echo url_for('photo/show?id='.$photo->getId()) ?>"><?php echo $photo->getId() ?></a></td>
      <td><?php echo $photo->getLocation() ?></td>
      <td><?php echo $photo->getAssociationId() ?></td>
      <td><?php echo $photo->getCreatedAt() ?></td>
      <td><?php echo $photo->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('photo/new') ?>">New</a>
