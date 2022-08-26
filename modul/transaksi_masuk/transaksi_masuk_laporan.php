 <?php

        echo  '
                 <section class="content-header">
                  <h1>
                    Laporan
                    <small>Data Transaksi Masuk</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active"><a href="#">Data Transaksi Masuk</a></li>
                    <li class="active"><a href="#">Laporan Data Transaksi Masuk</a></li>
                  </ol>
                </section>
                    <section class="content">
                      <div class="row">
                        <div class="col-xs-12">                            
                           <div class="box box-primary"><br>
                            <div class="box-body">                                
                              <table class="table table-bordered table-striped js-exportable">
                                <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Tanggal Transaksi</th>
                                  <th>Barang</th>
                                  <th>Supplier</th>
                                  <th>Banyak Barang</th>
                                  <th>Harga Satuan</th>
                                  <th>Total Bayar</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT transaksi_masuk.id_transaksi_masuk, transaksi_masuk.tgl_transaksi_masuk,barang.nama_barang,supplier.nama_supplier,transaksi_masuk.banyak_barang_masuk,transaksi_masuk.harga_satuan,transaksi_masuk.total_bayar FROM transaksi_masuk,barang,supplier where barang.id_barang=transaksi_masuk.id_barang and supplier.id_supplier=transaksi_masuk.id_supplier ");
                            if(mysqli_num_rows($sql) > 0){
                                $no = 0;

                                 while($row = mysqli_fetch_array($sql)){
                                    $no++;
                                echo '  
                                 <tr>
                                 <td>'.$no.'</td>
                                 <td>'.$row['tgl_transaksi_masuk'].'</td>
                                 <td>'.$row['nama_barang'].'</td>
                                 <td>'.$row['nama_supplier'].'</td>
                                 <td>'.$row['banyak_barang_masuk'].'</td>
                                 <td>'.$row['harga_satuan'].'</td>
                                 <td>'.$row['total_bayar'].'</td>';
                                            
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

?>
             