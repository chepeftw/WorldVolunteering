<h1>Videos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Url</th>
      <th>Association</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($videos as $video): ?>
    <tr>
      <td><a href="<?php echo url_for('video/show?id='.$video->getId()) ?>"><?php echo $video->getId() ?></a></td>
      <td><?php echo $video->getUrl() ?></td>
      <td><?php echo $video->getAssociationId() ?></td>
      <td><?php echo $video->getCreatedAt() ?></td>
      <td><?php echo $video->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('video/new') ?>">New</a>
