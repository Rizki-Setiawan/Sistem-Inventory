<?php

    if( isset( $_REQUEST['submit'] )){
        $id_barang =$_REQUEST['id_barang'];
        $nama_barang = $_REQUEST['nama_barang'];
        $jenis_barang = $_REQUEST['jenis_barang'];
        $stock_barang = $_REQUEST['stock_barang'];



        $sql = mysqli_query($con, "UPDATE barang SET nama_barang='$nama_barang', jenis_barang='$jenis_barang',stock_barang='$stock_barang' WHERE id_barang='$id_barang'");

        if($sql == true){
                ?>
                 <script type="text/javascript">
                    alert("Data berhasil di Edit. "); 

                document.location='./index.php?page=barang';
                </script>
                <?php
            die();
        } else {
            echo 'ERROR! Periksa penulisan querynya.';
        }
    } else {
    $id_barang = $_REQUEST['id_barang'];

    $sql = mysqli_query($con, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    while($row = mysqli_fetch_array($sql)){

?>
  <section class="content-header">
      <h1>
        Edit
        <small>Data Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Barang</a></li>
        <li class="active"><a href="#">Edit Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

         <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Barang</h3>
            </div>
            <form role="form" method="post" >
              <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" value="<?php echo $row['nama_barang'] ?>">
                </div>
                <div class="form-group">
                  <label>Jenis Barang</label>
                 <select name="jenis_barang" class="form-control" >
                    <option value="<?php echo $row['jenis_barang'] ?>"><?php echo $row['jenis_barang'] ?></option>
                    <option value="Alat Tulis" >Alat Tulis</option>
                    <option value="Pakaian" >Pakaian</option>
                    <option value="Makanan Dan Minuman" >Makanan Dan Minuman</option>
                    <option value="Kosmetik" >Kosmetik</option>
                  </select>
                </div>
                
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Stock Barang</label>
                  <input type="number" class="form-control" name="stock_barang" value="<?php echo $row['stock_barang'] ?>" >
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
<?php
    }
}
?>

    </div>
    </section>
