<?php


if(isset($_REQUEST['submit'])){

    $id_customer = $_REQUEST['id_customer'];

    $sql = mysqli_query($con, "DELETE FROM customer WHERE id_customer='$id_customer'");
    if($sql == true){
    	?>
     <script type="text/javascript">
	document.location='./index.php?page=customer';
	</script>
	<?php
        die();
    }
}
?>

