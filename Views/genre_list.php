<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<a href="<?= site_url('genre/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br />

<table class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $num = 1 ?>
    <?php foreach ($list as $row) : ?>
      <tr>
        <td><?= $num++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td nowrap>
          <a href="<?= site_url('genre/' . $row['id']) ?>"class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?= $this->endSection('content'); ?>