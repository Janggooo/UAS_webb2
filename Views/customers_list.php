<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<h1 class="h3 mb-4 text-gray-800">Data Customers</h1>

<a href="<?= site_url('customers/insert') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Insert</a>
<br /><br />

<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>ID Customers</th>
        <th>Nama</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Username</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($list as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['id_customers']; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['telepon']; ?></td>
          <td><?= $row['alamat']; ?></td>
          <td><?= $row['username']; ?></td>
          <td nowrap>
            <a href="<?= site_url('customers/'.$row['id']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Update</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>

<br />
<a href="<?= site_url('buku_export_xls') ?>" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>
<a href="<?= site_url('buku_export_pdf') ?>" class="btn btn-danger"><i class="fas fa-download"></i> Export PDF</a>

<?= $this->endSection('content'); ?>