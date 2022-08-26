<?php


if(isset($_REQUEST['submit'])){

    $id_transaksi_masuk = $_REQUEST['id_transaksi_masuk'];

    $sql = mysqli_query($con, "DELETE FROM transaksi_masuk WHERE id_transaksi_masuk='$id_transaksi_masuk'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=transaksi_masuk';
	</script>
	<?php
        die();
    }
}
?>

