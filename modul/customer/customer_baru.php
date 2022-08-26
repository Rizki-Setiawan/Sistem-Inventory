  <section class="content-header">
      <h1>
        Tambah
        <small>Data Customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Data Customer</a></li>
        <li class="active"><a href="#">Tambah Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Customer</h3>
            </div>
            <form role="form" method="post" onsubmit="return validasi_input(this)">
              <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Customer</label>
                  <input type="text" class="form-control" name="nama_customer" placeholder="Masukan Nama Customer">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Alamat Customer</label>
                  <input type="text" class="form-control" name="alamat_customer" placeholder="Masukan Alamat Customer">
                </div>
              </div>
              </div>
              <div class="box-footer">
                <a href="./index.php?page=customer" class="btn btn-success">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>

<script type="text/javascript">
function validasi_input(form){
   if (form.nama_customer.value == ""){
    alert("Masukan Nama Customer!");
    form.nama_customer.focus();
    return (false);
  }

   if (form.alamat_customer.value == ""){
    alert("Masukan Alamat Customer!");
    form.alamat_customer.focus();
    return (false);
  }
return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $nama_customer=$_REQUEST['nama_customer'];
    $alamat_customer=$_REQUEST['alamat_customer'];
         
        $sql="INSERT INTO `customer`(id_customer,nama_customer,alamat_customer)VALUES(null,'$nama_customer','$alamat_customer')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=customer';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>

  </div>
</section>

