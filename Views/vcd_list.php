<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<h1 class="h3 mb-4 text-gray-800">Data VCD</h1>

<a href="<?= site_url('vcd/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br /><br />

<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Genre</th>
        <th>Judul</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($list as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['genre_nama']; ?></td>
          <td><?= $row['judul']; ?></td>
          <td><?= $row['harga']; ?></td>
          <td nowrap>
            <a href="<?= site_url('vcd/'.$row['id']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>

<br />


<?= $this->endSection('content'); ?>