<?php
session_start();
require '../connect.php';

if(isset($_POST['update']))
{
    $id_dokter = $_POST['id_dokter'];
    $nama_dokter = $_POST['nama_dokter'];
	$telp = $_POST['telp'];

	$update = mysqli_query($conn, "UPDATE dokter SET  nama_dokter = '$nama_dokter', telp = '$telp' WHERE id_dokter = $id_dokter");

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
