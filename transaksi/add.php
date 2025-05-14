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
				<p class="text-gray-700 text-lg font-semibold mt-20 ml-12" >Enter transactions data</p>
			<div class="bg-white rounded-2xl shadow-md max-w-xl p-6  ml-12 mt-4">
						<form action="save.php" method="POST">
							<div class="mb-4">
								<label class="block text-sm font-medium text-gray-700 mb-1">Nama Pasien</label>
								<select name="id_pemeriksaan" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
									<option value="">Pilih Nama Pasien</option>
									<?php 
									include '../connect.php';

									$query = "SELECT DISTINCT pemeriksaan.id_pemeriksaan, pasien.nama_pasien FROM pemeriksaan 
									INNER JOIN pasien ON pemeriksaan.id_pasien = pasien.id_pasien";
									$query_run = mysqli_query($conn, $query);

									if(mysqli_num_rows($query_run) > 0)
									{
										while($data = mysqli_fetch_assoc($query_run))
										{
											?>
											<option value="<?= $data['id_pemeriksaan']; ?>"><?= $data['nama_pasien']; ?></option>
											<?php
										}
									}
									?>
								</select>
								</div>
								<div class="mb-4">
									<label class="block text-sm font-medium text-gray-700 mb-1">Biaya Dokter</label>
									<input type="text" name="jasa_dokter" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
								</div>
								<div class="flex justify-between items-center">
									<a href="view.php" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-6 py-1 rounded-lg">Cancel</a>
									<button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-1 rounded-lg">Save</button>
								</div>

							</form>
						</div>


					</div>
				</div>
			</div>
		</section>
		</main>
		<script src="../js/index.js"></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
			crossorigin="anonymous"
		></script>
	</body>
</html>
