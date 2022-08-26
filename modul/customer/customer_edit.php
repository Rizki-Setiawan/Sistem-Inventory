<?php

    if( isset( $_REQUEST['submit'] )){
        $id_customer =$_REQUEST['id_customer'];
        $nama_customer = $_REQUEST['nama_customer'];
        $alamat_customer = $_REQUEST['alamat_customer'];


        $sql = mysqli_query($con, "UPDATE customer SET nama_customer='$nama_customer', alamat_customer='$alamat_customer' WHERE id_customer='$id_customer'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=customer';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_customer = $_REQUEST['id_customer'];

    $sql = mysqli_query($con, "SELECT * FROM customer WHERE id_customer='$id_customer'");
    while($row = mysqli_fetch_array($sql)){

?>
  <section class="content-header">
      <h1>
        Edit
        <small>Data Customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Customer</a></li>
        <li class="active"><a href="#">Edit Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

         <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Customer</h3>
            </div>
            <form role="form" method="post" >
              <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Customer</label>
                  <input type="text" class="form-control" name="nama_customer" value="<?php echo $row['nama_customer'] ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Alamat Customer</label>
                  <input type="text" class="form-control" name="alamat_customer" value="<?php echo $row['alamat_customer'] ?>">
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
<?php
    }
}
?>

    </div>
    </section>
