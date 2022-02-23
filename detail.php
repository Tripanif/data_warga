<?php
@$aksi = $_GET['aksi'];
 @$judul = 'INPUT DETAIL';
 @$btnaksi = 'Simpan';
 @$no_kk = $_GET['no_kk'];
 @$nik = '';
 @$nama ='';
 @$ttl = '';
 
if ($aksi == 'edit') {
  $judul = 'EDIT DETAIL';
  $btnaksi = 'Edit';
  $sql = "SELECT * FROM detail_kk WHERE No_kk='$no_kk'";
  $query = mysqli_query($konek, $sql);
  $isi = mysqli_fetch_array($query);
  $no_kk = $isi[0];
  $nik = $isi[1];
  $nama = $isi[2];
  $ttl = $isi[3];
} else if($aksi == 'hapus') {
  $sql = "DELETE FROM detail_kk WHERE No_kk='$no_kk'";
  $query = mysqli_query($konek, $sql);
  echo "<meta http-equiv='refresh' content='1;url=?hal=detail'>";
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
    <label for="nik" class="form-label">Nik</label>
    <input type="number" value="<?php echo $nik; ?>" name="nik" class="form-control" id="nik" required="">
  </div>
   <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" value="<?php echo $nama; ?>" name="nama" class="form-control" id="nama" required="">
  </div>
  <div class="mb-3">
    <label for="ttl" class="form-label">TTL</label>
    <input type="text" name="ttl" value="<?php echo $ttl; ?>" class="form-control" id="ttl" required="">
  </div>
  <input type="submit" class="btn btn-primary" value="<?php echo $btnaksi; ?>" name="btnaksi">
</form>
</div>
  </div>
  <?php
  //jika tombol simpan di klik 
if (@$_POST['btnaksi'] == 'Simpan') {
  $no_kk = $_POST ['no_kk'];
  $nama = $_POST ['nama'];
  $nik = $_POST ['nik'];
  $ttl = $_POST ['ttl'];
  $sql = "INSERT into detail_kk VALUES('$no_kk', '$nik','$nama','$ttl')";
  $query= mysqli_query($konek, $sql);
  echo "<span class='badge badge-primary'>Data Berhasil disimpan</span>";
  echo "<meta http-equiv='refresh' content='1;url=?hal=detail'>";

  //jika tombol edit klik 
} else if (@$_POST['btnaksi'] == 'Edit') {
  $no_kk = $_POST ['no_kk'];
  $nik = $_POST ['nik'];
  $nama = $_POST ['nama'];
  $ttl = $_POST ['ttl'];
  $sql = "UPDATE detail_kk SET No_kk='$no_kk', Nik='$nik', Nama='$nama', TTL='$ttl' WHERE No_kk='$no_kk'";
  $query= mysqli_query($konek, $sql);
  echo "<span class='badge badge-primary'>Data berhasil diubah</span>";
  echo "<meta http-equiv='refresh' content='1;url=?hal=detail'>";
}
  ?>
  </div>
  <div class="col-sm">
    <table class="table">
        <thead class="table-blue">
      <tr>
<th>No_kk</th>
<th>Nik</th>
<th>Nama</th>
<th>TLL</th>
<th>Aksi</th>
</tr>
<tbody>
  <?php
  $sql = "SELECT * FROM detail_kk";
  $query= mysqli_query($konek, $sql);
  while ($data = mysqli_fetch_array($query)) {
   echo "<tr>
    <td>$data[No_kk]</td>
    <td>$data[Nik]</td>
    <td>$data[Nama]</td>
    <td>$data[TTL]</td>
    <td> <a class='btn btn-sm btn-primary' href='?hal=detail&aksi=edit&no_kk=$data[No_kk]'>Edit</a>
    <a class='btn btn-sm btn-danger' href='?hal=detail&aksi=hapus&no_kk=$data[No_kk]'>Hapus</a></td>
  </tr>";
  }
  ?>
  </tbody>
</table>
  </div>
</div>