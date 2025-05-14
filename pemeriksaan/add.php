<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}
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
			<p class="text-gray-700 text-lg font-semibold mt-20 ml-12" >Enter medical report's data</p>
		<div class="bg-white rounded-2xl shadow-md max-w-xl p-6  ml-12 mt-4">
			<form action="save.php" method="POST">
				<div class="mb-4">
					<label class="block text-sm font-medium text-gray-700 mb-1">Nama Pasien</label>
						<select name="id_pasien" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
							<option>Pilih Nama Pasien</option>
								<?php 
									include '../connect.php';

									$query = "SELECT * FROM pasien";
									$query_run = mysqli_query($conn, $query);

									if(mysqli_num_rows($query_run) > 0)
										{
									while($data = mysqli_fetch_assoc($query_run))
										{
									?>
									<option value="<?= $data['id_pasien']; ?>"><?= $data['nama_pasien']; ?></option>
									<?php
									}
									}
								?>
						</select>
				</div>
				<div class="mb-4">
					<label class="block text-sm font-medium text-gray-700 mb-1">Nama Dokter</label>
						<select name="id_dokter" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
							<option>Pilih Nama Dokter</option>
								<?php 
								include '../connect.php';

								$query = "SELECT * FROM dokter";
								$query_run = mysqli_query($conn, $query);

								if(mysqli_num_rows($query_run) > 0)
									{
								while($data = mysqli_fetch_assoc($query_run))
									{
								?>
							<option value="<?= $data['id_dokter']; ?>"><?= $data['nama_dokter']; ?></option>
								<?php
									}
									}
									?>
						</select>
				</div>
				<div class="mb-4">
					<label class="block text-sm font-medium text-gray-700 mb-1">Tensi</label>
						<input type="text" name="tensi" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
				</div>
				<div class="mb-4">
					<label class="block text-sm font-medium text-gray-700 mb-1">Keluhan</label>
					<input type="text" name="keluhan" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
				</div>
				<div class="mb-4">
					<label class="block text-sm font-medium text-gray-700 mb-1">Diagnosa</label>
					<input type="text" name="diagnosa" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
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
</body>
</html>
