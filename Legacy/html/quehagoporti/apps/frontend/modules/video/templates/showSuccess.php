<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $video->getId() ?></td>
    </tr>
    <tr>
      <th>Url:</th>
      <td><?php echo $video->getUrl() ?></td>
    </tr>
    <tr>
      <th>Association:</th>
      <td><?php echo $video->getAssociationId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $video->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $video->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('video/edit?id='.$video->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('video/index') ?>">List</a>
