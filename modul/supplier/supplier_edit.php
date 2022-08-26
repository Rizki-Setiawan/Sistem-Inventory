<?php

    if( isset( $_REQUEST['submit'] )){
        $id_supplier =$_REQUEST['id_supplier'];
        $nama_supplier = $_REQUEST['nama_supplier'];
        $alamat_supplier = $_REQUEST['alamat_supplier'];


        $sql = mysqli_query($con, "UPDATE supplier SET nama_supplier='$nama_supplier', alamat_supplier='$alamat_supplier' WHERE id_supplier='$id_supplier'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=supplier';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_supplier = $_REQUEST['id_supplier'];

    $sql = mysqli_query($con, "SELECT * FROM supplier WHERE id_supplier='$id_supplier'");
    while($row = mysqli_fetch_array($sql)){

?>
  <section class="content-header">
      <h1>
        Edit
        <small>Data Supplier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Supplier</a></li>
        <li class="active"><a href="#">Edit Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

         <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Supplier</h3>
            </div>
            <form role="form" method="post" >
              <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Supplier</label>
                  <input type="text" class="form-control" name="nama_supplier" value="<?php echo $row['nama_supplier'] ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Alamat Supplier</label>
                  <input type="text" class="form-control" name="alamat_supplier" value="<?php echo $row['alamat_supplier'] ?>">
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
<?php
    }
}
?>

    </div>
    </section>
