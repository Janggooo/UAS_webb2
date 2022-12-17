<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('vcd/'.$data['id']) ?>">
  <?= csrf_field() ?>
  <table class="table table-striped">
    <tr>
      <td>Genre</td>
      <td>
        <select name="id" class="form-control">
          <?php foreach($data_genre as $genre):?>
          <?php if($genre['id'] == $data['id']):?>
            <option value="<?= $genre['id'] ?>" selected><?= $genre['nama'] ?></option>
          <?php else:?>
            <option value="<?= $genre['id'] ?>"><?= $genre['nama'] ?></option>
          <?php endif?>
          <?php endforeach?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Judul</td>
      <td>
        <input type="text" name="judul" value="<?= $data['judul'] ?>"  class="form-control" />
      </td>
    </tr>
    <tr>
      <td>Harga</td>
      <td>
        <input type="text" name="harga" value="<?= $data['harga'] ?>"  class="form-control" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
        <a href="<?= site_url('vcd/delete/'.$data['id']) ?>"  onclick="return confirm('Yakin bro?')" class="btn btn-outline-secondary"><i class="fas fa-trash"></i></a>
      </td>
    </tr>
  </table>
</form>

<?= $this->endSection('content'); ?>