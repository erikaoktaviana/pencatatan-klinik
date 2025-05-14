<main class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-72 bg-gray-800 text-white">
        <?php include '../components/sidebar.php'; ?>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <section>
		<div class="w-full">
			<h2 class="text-gray-700 text-lg font-semibold mt-20 ml-12">Update doctor's data</h2>
        <div class="bg-white rounded-2xl max-w-xl shadow-md ml-12 p-6">
                <?php
                include '../connect.php';
                if (isset($_GET['id_dokter'])) {
                    $id_dokter = $_GET['id_dokter'];
                    $query = "SELECT * FROM dokter WHERE id_dokter='$id_dokter' ";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $data = mysqli_fetch_array($query_run);
                        ?>
                        <form action="update.php" method="POST" class="space-y-5">
                            <input type="hidden" name="id_dokter" value="<?= $data['id_dokter']; ?>">

                            <div>
                                <label for="nama_dokter" class="block text-sm font-medium text-gray-700 mb-1">Nama Dokter</label>
                                <input type="text" id="nama_dokter" name="nama_dokter"
                                    value="<?= $data['nama_dokter']; ?>"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    autocomplete="off" required>
                            </div>

                            <div>
                                <label for="telp" class="block text-sm font-medium text-gray-700 mb-1">No Telp</label>
                                <input type="text" id="telp" name="telp"
                                    value="<?= $data['telp']; ?>"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    autocomplete="off" required>
                            </div>

                            <div class="flex justify-between items-center">
								<a href="view.php"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-6 py-1 rounded-lg">
                                    Cancel
                                </a>
                                <button type="submit" name="update"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-1 rounded-lg">
                                    Update
                                </button>
                            </div>
                        </form>
                        <?php
                    } else {
                        echo "<h4 class='text-red-600 font-semibold'>No Such ID Found</h4>";
                    }
                }
                ?>
            </div>
			</div>
        </section>
    </div>
</main>
