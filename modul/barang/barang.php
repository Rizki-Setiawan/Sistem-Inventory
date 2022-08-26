 <?php

    if( isset( $_REQUEST['aksi'] )){
        $aksi = $_REQUEST['aksi'];
        switch($aksi){
            case 'baru':
                include 'barang_baru.php';
                break;
            case 'edit':
                include 'barang_edit.php';
                break;
            case 'hapus':
                include 'barang_hapus.php';
                break;
            case 'laporan':
                include 'barang_laporan.php';
              break;
            
        }
    } else {

        echo  '
                 <section class="content-header">
                  <h1>
                    View
                    <small>Data Barang</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active"><a href="#">Data Barang</a></li>
                  </ol>
                </section>
                    <section class="content">
                      <div class="row">
                        <div class="col-xs-12">                            
                           <div class="box box-primary"><br>
                           <div class="col-xs-2">
                                <a href="?page=barang&aksi=baru" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>&nbsp&nbspTambah Data</a>
                                </div>
                                <div class="col-xs-2">
                                <a href="?page=barang&aksi=laporan" class="btn btn-block btn-warning"><i class="fa fa-paste"></i>&nbsp&nbspLaporan</a>
                            </div><br><br>
                            <div class="box-body">                                
                              <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>No.</th>
                                  <th>Nama Barang</th>
                                  <th>Jenis Barang</th>
                                  <th>Stock Barang</th>
                                  <th>Tindakan</th>
                                </tr>
                                </thead>
                                <tbody> ';
                            $sql = mysqli_query($con, "SELECT * FROM barang");
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
                                 <td>'.$row['nama_barang'].'</td>
                                 <td>'.$row['jenis_barang'].'</td>
                                 <td>'.$row['stock_barang'].'</td>
                                 <td>
                        
                                 <a href="?page=barang&aksi=edit&id_barang='.$row['id_barang'].'" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                                 <a href="?page=barang&aksi=hapus&submit=yes&id_barang='.$row['id_barang'].'" onclick="return konfirmasi()" class="btn btn-danger btn-flat" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i> </a>
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
             