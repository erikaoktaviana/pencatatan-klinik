<?php
include_once '../connect.php';

if (isset($_POST['submit'])) {
    $id_resep = $_POST['id_resep'];
    $id_obat = $_POST['id_obat'];
    $id_pemeriksaan = $_POST['id_pemeriksaan'];
    $aturan_obat = $_POST['aturan_obat'];
    $jumlah_obat = $_POST['jumlah_obat'];

    $query = "INSERT INTO resep (id_resep, id_obat, aturan_obat, jumlah_obat, id_pemeriksaan) VALUES ('$id_resep','$id_obat','$aturan_obat','$jumlah_obat','$id_pemeriksaan')";
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
