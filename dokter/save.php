<?php
    include_once '../connect.php';

    if(isset($_POST['submit']))
    {    
        $id_dokter = $_POST['id_dokter'];
        $nama_dokter = $_POST['nama_dokter'];
        $telp = $_POST['telp'];

        $query = "INSERT INTO dokter (id_dokter,nama_dokter, telp) VALUES ('$id_dokter','$nama_dokter','$telp')";
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
