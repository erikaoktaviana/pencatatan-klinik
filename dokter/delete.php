<?php 
session_start();
require '../connect.php';
$id_dokter = $_GET['id_dokter'];

    $query = "DELETE FROM dokter WHERE id_dokter=".$id_dokter;
    $result = mysqli_query($conn,$query);

    if($result)
    {
        $_SESSION['message'] = "Data Berhasil di Hapus";
        header("Location: view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Data Gagal di Hapus";
        header("Location: view.php");
        exit(0);
    }
 ?>