 <?php

        echo  '
                 <section class="content-header">
                  <h1>
                    Laporan
                    <small>Data Supplier</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active"><a href="#">Data Supplier</a></li>
                    <li class="active"><a href="#">Laporan Data Supplier</a></li>
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
                                  <th>Nama Supplier</th>
                                  <th>Alamat Supplier</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT * FROM supplier");
                            if(mysqli_num_rows($sql) > 0){
                                $no = 0;

                                 while($row = mysqli_fetch_array($sql)){
                                    $no++;
                                echo '  
                                 <tr>
                                 <td>'.$no.'</td>
                                 <td>'.$row['nama_supplier'].'</td>
                                 <td>'.$row['alamat_supplier'].'</td>';
                                            
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
             