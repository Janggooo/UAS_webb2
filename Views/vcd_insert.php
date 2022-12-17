<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('vcd/insert') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Genre</td>
      <td>
        <select name="id" class="form-control">
          <?php foreach($data_genre as $genre):?>
          <option value="<?= $genre['id'] ?>"><?= $genre['nama'] ?></option>
          <?php endforeach?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Judul</td>
      <td>
        <input type="text" name="judul" value="" class="form-control" />
      </td>
    </tr>
    <tr>
      <td>Harga</td>
      <td>
        <input type="text" name="harga" value="" class="form-control" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save </button>
      </td>
    </tr>
  </table>
</form>

<?= $this->endSection('content'); ?>
