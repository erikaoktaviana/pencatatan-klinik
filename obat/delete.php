<?php 
session_start();
require '../connect.php';
$id_obat = $_GET['id_obat'];

    $query = "DELETE FROM obat WHERE id_obat=".$id_obat;
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