<?php 
ob_start();

//koneksi ke database dengan nama tutorial
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = '';
$db_name = 'db_pasien'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung dengan MySQL: ' . mysqli_connect_error());	
}
 ?>
