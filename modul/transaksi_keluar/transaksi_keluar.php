 <?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'transaksi_keluar_baru.php';
                break;
            case 'hapus':
                include 'transaksi_keluar_hapus.php';
                break;
            case 'laporan':
                include 'transaksi_keluar_laporan.php';
              break;
            
        }
    } else {

        echo  '
                 <section class="content-header">
                  <h1>
                    View
                    <small>Data Transaksi Keluar</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active"><a href="#">Data Transaksi Keluar</a></li>
                  </ol>
                </section>
                    <section class="content">
                      <div class="row">
                        <div class="col-xs-12">                            
                           <div class="box box-primary"><br>
                           <div class="col-xs-2">
                                <a href="?page=transaksi_keluar&aksi=baru" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>&nbsp&nbspTambah Data</a>
                                </div>
                                <div class="col-xs-2">
                                <a href="?page=transaksi_keluar&aksi=laporan" class="btn btn-block btn-warning"><i class="fa fa-paste"></i>&nbsp&nbspLaporan</a>
                            </div><br><br>
                            <div class="box-body">                                
                              <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Tanggal Transaksi</th>
                                  <th>Nama Barang</th>
                                  <th>Nama Customer</th>
                                  <th>Banyak Barang</th>
                                  <th>Harga Satuan</th>
                                  <th>Total Bayar</th>
                                  <th>Tindakan</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT transaksi_keluar.id_transaksi_keluar, transaksi_keluar.tgl_transaksi_keluar,barang.nama_barang,customer.nama_customer,transaksi_keluar.banyak_barang_keluar,transaksi_keluar.harga_satuan,transaksi_keluar.total_bayar FROM transaksi_keluar,barang,customer where barang.id_barang=transaksi_keluar.id_barang and customer.id_customer=transaksi_keluar.id_customer ");
                            if(mysqli_num_rows($sql) > 0){
                                $no = 0;

                                 while($row = mysqli_fetch_array($sql)){
                                    $no++;
                                echo '  
                                 <script type="text/javascript" language="JavaScript">
                                    function konfirmasi(){
                                        tanya = confirm("Anda yakin akan menghapus data ini?");
                                        if (tanya == true) return true;
                                        else return false;
                                    }
                                </script>
                                 <tr>
                                 <td>'.$no.'</td>
                                 <td>'.$row['tgl_transaksi_keluar'].'</td>
                                 <td>'.$row['nama_barang'].'</td>
                                 <td>'.$row['nama_customer'].'</td>
                                 <td>'.$row['banyak_barang_keluar'].'</td>
                                 <td>'.$row['harga_satuan'].'</td>
                                 <td>'.$row['total_bayar'].'</td>
                                 <td>

                                 <a href="?page=transaksi_keluar&aksi=hapus&submit=yes&id_transaksi_keluar='.$row['id_transaksi_keluar'].'" onclick="return konfirmasi()" class="btn btn-danger btn-flat" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i> </a>
                                 </td>';
                                            
                                        }
                            }
                            echo '                                                            
                                    </tbody>
                                </table>

                            </div>
                          </div>
                        </div>
                      </div>
                    </section>';
    }
?>
             