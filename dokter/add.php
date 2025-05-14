<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}
$current_page = 'doctor';
?>

<main class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-72 bg-gray-800 text-white">
        <?php include '../components/sidebar.php'; ?>
    </div>

<!-- Main Content -->
	<div class="flex-1 p-6">
		<section>
			<div class="w-full">
				<p class="text-gray-700 text-lg font-semibold mt-20 ml-12" >Enter doctor's data</p>
			<div class="bg-white rounded-2xl shadow-md max-w-xl p-6  ml-12 mt-4">
					<form action="save.php" method="POST" class="space-y-5">
						<div>
							<label for="nama_dokter" class="block text-sm font-medium text-gray-700 mb-1">Nama Dokter</label>
							<input type="text" id="nama_dokter" name="nama_dokter" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off" required>
						</div>
						<div>
							<label for="telp" class="block text-sm font-medium text-gray-700 mb-1">No Telp</label>
							<input type="text" id="telp" name="telp" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off" required>
						</div>
						<div class="flex justify-between items-center">
							<a href="view.php" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-6 py-1 rounded-lg">Cancel</a>
							<button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-1 rounded-lg">Save</button>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
</main>

</body>
</html>