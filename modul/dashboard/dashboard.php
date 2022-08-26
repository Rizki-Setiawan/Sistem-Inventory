<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-body"><br>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>
              <?php
              $sql = mysqli_query($con, "SELECT * FROM barang");
              $hasil = mysqli_num_rows($sql);
              echo $hasil;
              ?>
             </h3>
              <p>Barang</p>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="index.php?page=barang" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              <?php
              $sql = mysqli_query($con, "SELECT * FROM supplier");
              $hasil1 = mysqli_num_rows($sql);
              echo $hasil1;
              ?>
             </h3>
              <p>Supplier</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="index.php?page=supplier" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
              <?php
              $sql = mysqli_query($con, "SELECT * FROM customer");
              $hasil2 = mysqli_num_rows($sql);
              echo $hasil2;
              ?>
             </h3>
              <p>Customer</p>
            </div>
            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
            <a href="index.php?page=customer" class="small-box-footer">Info Selegkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
              <?php
              $sql = mysqli_query($con, "SELECT * FROM pengguna");
              $hasil3 = mysqli_num_rows($sql);
              echo $hasil3;
              ?>
             </h3>
              <p>Pengguna</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?page=pengguna" class="small-box-footer">Info Selegkapnya <i class="fa fa-group"></i></a>
          </div>
        </div>


        </div>
      </div>
    </div>
  </div>
</section>

 