<?php


if(isset($_REQUEST['submit'])){

    $id_supplier = $_REQUEST['id_supplier'];

    $sql = mysqli_query($con, "DELETE FROM supplier WHERE id_supplier='$id_supplier'");
    if($sql == true){
    	?>
     <script type="text/javascript">
	document.location='./index.php?page=supplier';
	</script>
	<?php
        die();
    }
}
?>

