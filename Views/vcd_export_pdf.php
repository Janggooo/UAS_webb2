<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Genre</th>
        <th>Judul</th>
        <th>Harga</th>
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
      <?php endforeach ?>
    </tbody>
</table>