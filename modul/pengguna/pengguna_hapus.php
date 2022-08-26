<?php


if(isset($_REQUEST['submit'])){

    $id_pengguna = $_REQUEST['id_pengguna'];

    $sql = mysqli_query($con, "DELETE FROM pengguna WHERE id_pengguna='$id_pengguna'");
    if($sql == true){
    	?>
     <script type="text/javascript">
    alert("Data berhasil di Hapus. "); 
	document.location='./index.php?page=pengguna';
	</script>
	<?php
        die();
    }
}
?>

