<?php
    include_once '../connect.php';

    if(isset($_POST['submit']))
    {    
        $id_pasien = $_POST['id_pasien'];
        $nama_pasien = $_POST['nama_pasien'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $usia = $_POST['usia'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO pasien (id_pasien,nama_pasien,jenis_kelamin, usia, alamat) VALUES ('$id_pasien','$nama_pasien','$jenis_kelamin','$usia','$alamat')";
        $result = mysqli_query($conn, $query); 


    if($result)
        {
            $_SESSION['message'] = "Data Berhasil di Simpan";
            header("Location: view.php");
            exit(0);
        }
    else
        {
            $_SESSION['message'] = "Data Gagal di Simpan";
            header("Location: view.php");
            exit(0);
        }
    }
?>
