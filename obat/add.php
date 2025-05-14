<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}
$current_page = 'medicine';
?>

<main class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-72 bg-gray-800 text-white">
        <?php include '../components/sidebar.php'; ?>
    </div>

	<div class="flex-1 p-6">
		<section>
			<div class="w-full">
				<p class="text-gray-700 text-lg font-semibold mt-20 ml-12">Enter medicine's data</p>
				<div class="bg-white rounded-2xl shadow-md max-w-xl p-6  ml-12 mt-4">
                        <form action="save.php" method="POST">
                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Obat</label>
                                <input type="text" name="nama_obat" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off" autocomplete="off">
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                                <input type="text" name="deskripsi" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off" autocomplete="off">
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                                <input type="text" name="harga" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off" autocomplete="off">
                            </div class="mb-2">
							<div class="flex justify-between items-center mt-4">
								<a href="view.php" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-6 py-1 rounded-lg">Cancel</a>
								<button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-1 rounded-lg">Save</button>
							</div>
                        </form>
                    </div>
				</div>
		</section>
		</d>
	</body>
</html>
