  <section class="content-header">
      <h1>
        Tambah
        <small>Data Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Data Pengguna</a></li>
        <li class="active"><a href="#">Tambah Data</a></li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pengguna</h3>
            </div>
            <form role="form" method="post" onsubmit="return validasi_input(this)">
              <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Fullname</label>
                  <input type="text" class="form-control" name="fullname" placeholder="Masukan Fullname">
                </div>
                   <div class="form-group">
                  <label>Level</label>
                 <select name="level" class="form-control" >
                    <option value="" disabled selected>Pilih Level Pengguna</option>
                    <option value="admin" >Admin</option>
                    <option value="petugas" >Petugas</option>
                    <option value="pemilik" >Pemilik</option>
                  </select>
                </div>
              </div>
              </div>
              <div class="box-footer">
                <a href="./index.php?page=pengguna" class="btn btn-success">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>

<script type="text/javascript">
function validasi_input(form){
   if (form.username.value == ""){
    alert("Masukan Username!");
    form.username.focus();
    return (false);
  }

   if (form.password.value == ""){
    alert("Masukan Password!");
    form.password.focus();
    return (false);
  }


   if (form.fullname.value == ""){
    alert("Masukan Fullname!");
    form.fullname.focus();
    return (false);
  }

   if (form.level.value == ""){
    alert("Masukan Level!");
    form.level.focus();
    return (false);
  }


return (true);
}
</script>
<?php

$submit=@$_REQUEST['submit'];
if(isset($submit)){
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $fullname=$_REQUEST['fullname'];
    $level=$_REQUEST['level'];


         
  $sql="INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `fullname`, `level`) VALUES (NULL, '$username', MD5('$password'), '$fullname', '$level')";

        $result=mysqli_query($con,$sql);
        if($result ==true){
        ?><script type="text/javascript">
            alert('Data Berhasil Di input! ');
            window.location='./index.php?page=pengguna';
        </script><?php
    }else{
        echo "error";
    }
   
}   

?>

  </div>
</section>

