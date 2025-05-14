<?php
    include_once '../connect.php';

    if(isset($_POST['submit']))
    {   
        $nama_dokter = $_POST['nama_dokter'];
        $telp = $_POST['telp'];

        $query = "INSERT INTO dokter (nama_dokter, telp) VALUES ('$nama_dokter','$telp')";
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
