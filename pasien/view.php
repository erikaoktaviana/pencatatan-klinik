<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}

$current_page = 'pasien';
?>

<main class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-72 bg-gray-800 text-white">
        <?php include '../components/sidebar.php'; ?>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <section class="">
            <div class="flex justify-between items-center p-2">
                <p class="text-xl text-gray-700 font-bold mt-24">ALL PATIENT</p>  
                <a href="add.php" class="bg-blue-500 text-white font-medium py-1 px-2 rounded-lg hover:bg-blue-700 transition mt-24">
                    + Add Data
                </a>
            </div>


            <div class="overflow-x-auto mt-4">
                    <table class="min-w-full bg-white border border-gray-100 rounded-lg overflow-hidden border-separate" style="border-spacing: 0">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal border-b border-gray-200 text-left">
                                <th class="py-2 px-4 border-b">Nama Pasien</th>
                                <th class="py-2 px-4 border-b">Jenis Kelamin</th>
                                <th class="py-2 px-4 border-b">Usia</th>
                                <th class="py-2 px-4 border-b">Alamat</th>
                                <th class="py-2 px-4 border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-base font-normal">
                        <?php 
                        include '../connect.php';
                        $query = "SELECT * FROM pasien";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0) {
                            foreach($query_run as $data) {
                        ?>
                            <tr>
                                <td class="p-3 border-b"><?= $data['nama_pasien']; ?></td>
                                <td class="p-3 border-b"><?= $data['jenis_kelamin']; ?></td>
                                <td class="p-3 border-b"><?= $data['usia']; ?></td>
                                <td class="p-3 border-b"><?= $data['alamat']; ?></td>
                                <td class="p-3 border-b">
                                <a href="form-update.php?id_pasien=<?= $data['id_pasien']; ?>" class="text-blue-500 hover:text-blue-700 mx-2">
                                    <img src="../assets/images/edit.svg" class="w-4 h-4 inline">
                                </a>
                                <a href="delete.php?id_pasien=<?= $data['id_pasien']; ?>" class="text-red-500 hover:text-red-700">
                                    <img src="../assets/images/Delete.svg" class="w-4 h-4 inline">
                                </a>
                                </td>
                            </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No Record Found</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
        </section>
    </div>
</main>

</body>
</html>