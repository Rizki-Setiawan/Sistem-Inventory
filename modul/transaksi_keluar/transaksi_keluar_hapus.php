<?php


if(isset($_REQUEST['submit'])){

    $id_transaksi_keluar = $_REQUEST['id_transaksi_keluar'];

    $sql = mysqli_query($con, "DELETE FROM transaksi_keluar WHERE id_transaksi_keluar='$id_transaksi_keluar'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=transaksi_keluar';
	</script>
	<?php
        die();
    }
}
?>

