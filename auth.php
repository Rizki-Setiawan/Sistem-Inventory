<?php
session_start();
if(!isset($_SESSION["id_pengguna"])){
header("Location: login.php");
exit(); }
?>
