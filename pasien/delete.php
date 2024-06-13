<?php 
session_start();
require '../connect.php';
$id_pasien = $_GET['id_pasien'];

    $query = "DELETE FROM pasien WHERE id_pasien=".$id_pasien;
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