<?php


if(isset($_REQUEST['submit'])){

    $id_barang = $_REQUEST['id_barang'];

    $sql = mysqli_query($con, "DELETE FROM barang WHERE id_barang='$id_barang'");
    if($sql == true){
    	?>
     <script type="text/javascript">
	document.location='./index.php?page=barang';
	</script>
	<?php
        die();
    }
}
?>

