<?php
if( isset($_REQUEST['page'] )){

  $page = $_REQUEST['page'];

  switch( $page ){
    case 'dashboard':
      include "modul/dashboard/dashboard.php";
      break;
    case 'barang':
      include "modul/barang/barang.php";
      break;
    case 'supplier':
      include "modul/supplier/supplier.php";
      break;
    case 'customer':
      include "modul/customer/customer.php";
      break;
    case 'transaksi_masuk':
      include "modul/transaksi_masuk/transaksi_masuk.php";
      break;
    case 'transaksi_keluar':
      include "modul/transaksi_keluar/transaksi_keluar.php";
      break;
    case 'pengguna':
      include "modul/pengguna/pengguna.php";
      break;

  }
} else {
?>
    <div class="jumbotron">
      <h2>Page Not Found</h2>
    </div>
<?php
}


?>
