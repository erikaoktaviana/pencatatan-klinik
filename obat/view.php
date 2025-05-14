<?php 
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

$current_page = 'obat';
?>

<main class="flex min-h-screen">
<!-- Sidebar -->
<div class="w-72 bg-gray-800 text-white min-h-screen">
    <?php include '../components/sidebar.php'; ?>
</div>

<!-- Main Content -->
<div class="flex-1 p-6">
    <section>
        <div class="flex justify-between items-center p-2">
            <p class="text-xl text-gray-700 font-bold mt-24">MEDICINE</p>  
			<a href="add.php" class="bg-blue-500 text-white font-medium py-1 px-2 rounded-lg hover:bg-blue-700 transition mt-24">
                + Add Data
            </a>
        </div>

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden text-left">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border-b">Nama Obat</th>
                        <th class="px-4 py-3 border-b">Deskripsi</th>
                        <th class="px-4 py-3 border-b">Harga</th>
                        <th class="px-4 py-3 border-b">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    <?php 
                    include '../connect.php';
                    $query = "SELECT * FROM obat";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0):
                        foreach($query_run as $data): ?>
                            <tr class="hover:bg-gray-50 border-t">
                                <td class="px-4 py-2"><?= htmlspecialchars($data['nama_obat']); ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($data['deskripsi']); ?></td>
                                <td class="px-4 py-2">Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
                                <td class="px-4 py-2 flex gap-3">
                                    <a href="form-update.php?id_obat=<?= $data['id_obat']; ?>" class="text-blue-600 hover:underline">
                                        <img src="../assets/images/edit.svg" alt="Edit" class="w-5 h-5 inline" />
                                    </a>
                                    <a href="delete.php?id_obat=<?= $data['id_obat']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                        <img src="../assets/images/Delete.svg" alt="Delete" class="w-5 h-5 inline" />
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;
                   		 else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Data obat belum tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

</body>
</html>
