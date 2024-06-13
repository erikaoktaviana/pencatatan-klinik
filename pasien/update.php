<?php
session_start();
require '../connect.php';

if(isset($_POST['update']))
{
    $id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$usia = $_POST['usia'];
	$alamat = $_POST['alamat'];
	
	$update = mysqli_query($conn, "UPDATE pasien SET nama_pasien = '$nama_pasien', jenis_kelamin = '$jenis_kelamin', usia = '$usia', alamat = '$alamat' WHERE id_pasien = $id_pasien");

    if($update)
    {
        $_SESSION['message'] = "Data Berhasil di Update";
        header("Location: view.php");
        exit();
    }
    else
    {
        die("Query Error: " . mysqli_error($conn));
    }
}

?>
