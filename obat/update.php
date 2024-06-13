<?php
session_start();
require '../connect.php';

if(isset($_POST['update']))
{
    $id_obat = $_POST['id_obat'];
	$nama_obat = $_POST['nama_obat'];
	$deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];
	
	$update = mysqli_query($conn, "UPDATE obat SET  nama_obat = '$nama_obat', deskripsi = '$deskripsi', harga = '$harga' WHERE id_obat = $id_obat");

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
