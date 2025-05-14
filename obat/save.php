<?php
session_start();

include_once '../connect.php';

if (isset($_POST['submit'])) {
    $nama_obat = $_POST['nama_obat'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO obat (nama_obat, deskripsi, harga) VALUES ('$nama_obat','$deskripsi','$harga')";
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
