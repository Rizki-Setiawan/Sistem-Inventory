  <section class="content-header">
      <h1>
        Tambah
        <small>Data Transaksi Masuk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Data Transaksi Masuk</a></li>
        <li class="active"><a href="#">Tambah Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Transaksi Masuk</h3>
            </div>
            <form role="form" method="post" onsubmit="return validasi_input(this)">
              <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal Transaksi</label>
                  <input type="date" class="form-control" name="tgl_transaksi_masuk">
                </div>
                   <div class="form-group">
                     <label>Nama Barang</label>               
                          <select name="id_barang" class="form-control" >
                            <option value="" disabled selected>Pilih Barang</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM barang");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_barang'];?>">
                              <?php echo $row['nama_barang'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
                     </div>
                       <div class="form-group">
                     <label>Nama Supplier</label>               
                          <select name="id_supplier" class="form-control" >
                            <option value="" disabled selected>Pilih Supplier</option>
                              <?php
                                  include 'db.php';
                                  $res=$con->query("SELECT * FROM supplier");
                                  while ($row=$res->fetch_array()) {
                              ?>
                            <option value="<?php echo $row['id_supplier'];?>">
                              <?php echo $row['nama_supplier'];?>
                            </option>
                              <?php
                                }
                                ?>
                          </select>
                     </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Banyak Barang</label>
                  <input type="number" class="form-control" name="banyak_barang_masuk" placeholder="Masukan Banyak Barang">
                </div>
                <div class="form-group">
                  <label>Harga Satuan</label>
                  <input type="number" class="form-control" name="harga_satuan" placeholder="Masukan Harga Satuan">
                </div>
              </div>
              </div>
              <div class="box-footer">
                <a href="./index.php?page=transaksi_masuk" class="btn btn-success">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>

<script type="text/javascript">
function validasi_input(form){
   if (form.tgl_transaksi_masuk.value == ""){
    alert("Masukan Tanggal Transaksi!");
    form.tgl_transaksi_masuk.focus();
    return (false);
  }

   if (form.id_barang.value == ""){
    alert("Masukan Nama Barang!");
    form.id_barang.focus();
    return (false);
  }

   if (form.id_supplier.value == ""){
    alert("Masukan Nama Supplier!");
    form.id_supplier.focus();
    return (false);
  }
   if (form.banyak_barang_masuk.value == ""){
    alert("Masukan Banyak Barang!");
    form.banyak_barang_masuk.focus();
    return (false);
  }
   if (form.harga_satuan.value == ""){
    alert("Masukan Harga Satuan!");
    form.harga_satuan.focus();
    return (false);
  }

return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $tgl_transaksi_masuk=$_REQUEST['tgl_transaksi_masuk'];
    $id_barang=$_REQUEST['id_barang'];
    $id_supplier=$_REQUEST['id_supplier'];
    $banyak_barang_masuk=$_REQUEST['banyak_barang_masuk'];
    $harga_satuan=$_REQUEST['harga_satuan'];


         
  $sql="INSERT INTO `transaksi_masuk` (`id_transaksi_masuk`, `tgl_transaksi_masuk`, `id_barang`, `id_supplier`, `banyak_barang_masuk`, `harga_satuan`, `total_bayar`) VALUES (NULL, '$tgl_transaksi_masuk', '$id_barang', '$id_supplier', '$banyak_barang_masuk', '$harga_satuan', '$harga_satuan'*'$banyak_barang_masuk')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=transaksi_masuk';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>

  </div>
</section>

