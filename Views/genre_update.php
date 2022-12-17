<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<h1 class="h3 mb-4 text-gray-800">Update Data Genre</h1>

<form method="post" action="<?= site_url('genre/' . $data['id']) ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="<?= site_url('genre/delete/' . $data['id']) ?>" onclick="return confirm('yakin bro?')" class="btn btn-outline-secondary"><i class="fas fa-trash"></i></a>
      </td>
    </tr>
  </table>
</form>

<?= $this->endSection('content'); ?>