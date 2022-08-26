  <section class="content-header">
      <h1>
        Tambah
        <small>Data Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Data Barang</a></li>
        <li class="active"><a href="#">Tambah Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Barang</h3>
            </div>
            <form role="form" method="post" onsubmit="return validasi_input(this)">
              <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" placeholder="Masukan Nama Barang">
                </div>
             
              </div>
              <div class="col-md-6">
                   <div class="form-group">
                  <label>Jenis Barang</label>
                 <select name="jenis_barang" class="form-control" >
                    <option value="" disabled selected>Pilih Jenis Barang</option>
                    <option value="Alat Tulis" >Alat Tulis</option>
                    <option value="Pakaian" >Pakaian</option>
                    <option value="Makanan Dan Minuman" >Makanan Dan Minuman</option>
                    <option value="Kosmetik" >Kosmetik</option>
                  </select>
                </div>
              </div>
              </div>
              <div class="box-footer">
                <a href="./index.php?page=barang" class="btn btn-success">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>

<script type="text/javascript">
function validasi_input(form){
   if (form.nama_barang.value == ""){
    alert("Masukan Nama Barang!");
    form.nama_barang.focus();
    return (false);
  }

   if (form.jenis_barang.value == ""){
    alert("Masukan Jenis Barang!");
    form.jenis_barang.focus();
    return (false);
  }



return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $nama_barang=$_REQUEST['nama_barang'];
    $jenis_barang=$_REQUEST['jenis_barang'];


         
  $sql="INSERT INTO `barang`(id_barang,nama_barang,jenis_barang)VALUES(null,'$nama_barang','$jenis_barang')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=barang';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>

  </div>
</section>

