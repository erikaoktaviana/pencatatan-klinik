<?php
    include_once '../connect.php';

    if(isset($_POST['submit']))
    {    

        $id_pembayaran = $_POST['id_pembayaran'];
        $id_pemeriksaan = $_POST['id_pemeriksaan'];
        $jasa_dokter = $_POST['jasa_dokter'];

        $query = "SELECT harga_resep FROM pemeriksaan WHERE id_pemeriksaan = $id_pemeriksaan";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $harga_resep = $row['harga_resep'];

        $total_bayar = $jasa_dokter + $harga_resep; 

        $query = "INSERT INTO pembayaran (id_pembayaran, id_pemeriksaan, jasa_dokter, total_bayar) VALUES ('$id_pembayaran','$id_pemeriksaan','$jasa_dokter','$total_bayar')";
        $result = mysqli_query($conn, $query); 


    if($result)
        {
            $_SESSION['message'] = "Data Berhasil di Simpan";
            header("Location: view.php");
            exit(0);
        }
    else
        {
          die("Query Error: " . mysqli_error($conn));
        }
    }
?>
