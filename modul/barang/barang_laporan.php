 <?php

        echo  '
                 <section class="content-header">
                  <h1>
                    Laporan
                    <small>Data Barang</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active"><a href="#">Data Barang</a></li>
                    <li class="active"><a href="#">Laporan Data Barang</a></li>

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
                                  <th>Nama Barang</th>
                                  <th>Jenis Barang</th>
                                  <th>Stock Barang</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT * FROM barang");
                            if(mysqli_num_rows($sql) > 0){
                                $no = 0;

                                 while($row = mysqli_fetch_array($sql)){
                                    $no++;
                                echo '  
                                 <tr>
                                 <td>'.$no.'</td>
                                 <td>'.$row['nama_barang'].'</td>
                                 <td>'.$row['jenis_barang'].'</td>
                                 <td>'.$row['stock_barang'].'</td>';
                                            
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
             