  <section class="content-header">
      <h1>
        Tambah
        <small>Data Supplier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Data Supplier</a></li>
        <li class="active"><a href="#">Tambah Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Supplier</h3>
            </div>
            <form role="form" method="post" onsubmit="return validasi_input(this)">
              <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Supplier</label>
                  <input type="text" class="form-control" name="nama_supplier" placeholder="Masukan Nama Supplier">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Alamat Supplier</label>
                  <input type="text" class="form-control" name="alamat_supplier" placeholder="Masukan Alamat Supplier">
                </div>
              </div>
              </div>
              <div class="box-footer">
                <a href="./index.php?page=supplier" class="btn btn-success">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>

<script type="text/javascript">
function validasi_input(form){
   if (form.nama_supplier.value == ""){
    alert("Masukan Nama Supplier!");
    form.nama_supplier.focus();
    return (false);
  }

   if (form.alamat_supplier.value == ""){
    alert("Masukan Alamat Supplier!");
    form.alamat_supplier.focus();
    return (false);
  }
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $nama_supplier=$_REQUEST['nama_supplier'];
    $alamat_supplier=$_REQUEST['alamat_supplier'];
         
        $sql="INSERT INTO `supplier`(id_supplier,nama_supplier,alamat_supplier)VALUES(null,'$nama_supplier','$alamat_supplier')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=supplier';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>

  </div>
</section>

