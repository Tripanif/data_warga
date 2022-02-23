<?php
@$aksi = $_GET['aksi'];
 @$judul = 'INPUT ARSIP';
 @$btnaksi = 'Simpan';
 @$no_kk = $_GET['no_kk'];
 @$kepala_keluarga = '';
 
if ($aksi == 'edit') {
  $judul = 'EDIT ARSIP';
  $btnaksi = 'Edit';
  $sql = "SELECT * FROM arsip_kk WHERE No_kk='$no_kk'";
  $query = mysqli_query($konek, $sql);
  $isi = mysqli_fetch_array($query);
  $no_kk = $isi[0];
  $kepala_keluarga = $isi[1];
} else if($aksi == 'hapus') {
  $sql = "DELETE FROM arsip_kk WHERE No_kk='$no_kk'";
  $query = mysqli_query($konek, $sql);
  echo "<meta http-equiv='refresh' content='1;url=?hal=arsip'>";
}
?>
<div class="row mt-3">
  <div class="col-sm-4 ml-2">
    <div class="card border-dark mb-3 target-left" style="max-width: 18rem;">
  <div class="card-header bg-trdarkansparent border-dark"><?php echo $judul; ?></div>
  <div class="card-body text-dark">
    <form method="post" action="">
  <div class="mb-3">
    <label for="no_kk" class="form-label">No_kk</label>
    <input type="number" value="<?php echo $no_kk; ?>" name="no_kk" class="form-control" id="no_kk" required="">
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Kepala_keluarga</label>
    <input type="text" name="kepala_keluarga" value="<?php echo $kepala_keluarga; ?>" class="form-control" id="kepala_keluarga" required="">
  </div>
  <input type="submit" class="btn btn-primary" value="<?php echo $btnaksi; ?>" name="btnaksi">
</form>
</div>
  </div>
  <?php
  //jika tombol simpan di klik 
if (@$_POST['btnaksi'] == 'Simpan') {
  $no_kk = $_POST ['no_kk'];
  $kepala_keluarga = $_POST ['kepala_keluarga'];
  $sql = "INSERT into arsip_kk VALUES('$no_kk', '$kepala_keluarga')";
  $query= mysqli_query($konek, $sql);
  echo "<span class='badge badge-primary'>Data Berhasil disimpan</span>";
  echo "<meta http-equiv='refresh' content='1;url=?hal=arsip'>";

  //jika tombol edit klik 
} else if (@$_POST['btnaksi'] == 'Edit') {
  $no_kk = $_POST ['no_kk'];
  $kepala_keluarga = $_POST ['kepala_keluarga'];
  $sql = "UPDATE arsip_kk SET No_kk='$no_kk', Kepala_keluarga='$kepala_keluarga'WHERE No_kk='$nonya'";
  $query= mysqli_query($konek, $sql);
  echo "<span class='badge badge-primary'>Data berhasil diubah</span>";
  echo "<meta http-equiv='refresh' content='1;url=?hal=arsip'>";
}
  ?>
  </div>
  <div class="col-sm">
    <table class="table">
        <thead class="table-blue">
      <tr>
<th>No_kk</th>
<th>Kepala_keluarga</th>
<th>Aksi</th>
</tr>
<tbody>
  <?php
  $sql = "SELECT * FROM arsip_kk";
  $query= mysqli_query($konek, $sql);
  while ($data = mysqli_fetch_array($query)) {
   echo "<tr>
    <td>$data[No_kk]</td>
    <td>$data[Kepala_keluarga]</td>
    <td> <a class='btn btn-sm btn-primary' href='?hal=arsip&aksi=edit&no_kk=$data[No_kk]'>Edit</a>
    <a class='btn btn-sm btn-danger' href='?hal=arsip&aksi=hapus&no_kk=$data[No_kk]'>Hapus</a></td>
  </tr>";
  }
  ?>
  </tbody>
</table>
  </div>
</div>