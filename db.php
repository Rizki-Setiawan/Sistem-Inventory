<?php

$con = mysqli_connect("localhost","root","","inventory_barang");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: ".mysqli_connect_error();
  }
?>
