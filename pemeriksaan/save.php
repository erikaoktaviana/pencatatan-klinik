<?php
include_once '../connect.php';

if (isset($_POST['submit'])) {
    $id_pasien = $_POST['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $tensi = $_POST['tensi'];
    $keluhan = $_POST['keluhan'];
    $diagnosa = $_POST['diagnosa'];
    $harga_resep = $_POST['harga_resep'];

    $query = "INSERT INTO pemeriksaan (id_pasien, id_dokter, tensi, keluhan, diagnosa, harga_resep) VALUES ('$id_pasien', '$id_dokter','$tensi','$keluhan', '$diagnosa', '$harga_resep')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = "Data Berhasil di Simpan";
        header("Location: view.php");
        exit(0);
    } else {
        die("Query Error: " . mysqli_error($conn));
    }
}
?>
