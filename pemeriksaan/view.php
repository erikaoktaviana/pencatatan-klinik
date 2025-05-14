<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}

$current_page = 'pemeriksaan';
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
                <p class="text-xl text-gray-700 font-bold mt-20">MEDICAL RECORD</p>  
                <a href="add.php" class="bg-blue-500 text-white font-medium py-1 px-2 rounded-lg hover:bg-blue-700 transition mt-20">
                    + Add Data
                </a>
            </div>

			<div class="overflow-x-auto mt-4">
					<table class="min-w-full bg-white border border-gray-100 rounded-lg overflow-hidden border-separate" style="border-spacing: 0">
						<thead>
							<tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal border-b border-gray-200 text-left">
								<th class="py-2 px-4 border-b">Nama Pasien</th>
								<th class="py-2 px-4 border-b">Dokter</th>
								<th class="py-2 px-4 border-b">Tensi</th>
								<th class="py-2 px-4 border-b">Keluhan</th>
								<th class="py-2 px-4 border-b">Diagnosa</th>
								<th class="py-2 px-4 border-b">Resep</th>
							</tr>
						</thead>
						<tbody class="text-gray-700 text-base font-normal">
							<?php
							include '../connect.php';
							$query = "SELECT * FROM pemeriksaan 
										INNER JOIN pasien ON pasien.id_pasien = pemeriksaan.id_pasien
										INNER JOIN dokter ON dokter.id_dokter = pemeriksaan.id_dokter ";
							$query_run = mysqli_query($conn, $query);

							if (mysqli_num_rows($query_run) > 0) {
								foreach ($query_run as $data) {
									$queryresep = "SELECT * FROM resep
													INNER JOIN obat ON obat.id_obat = resep.id_obat WHERE id_pemeriksaan = " . $data['id_pemeriksaan'];
									$queryresep_run = mysqli_query($conn, $queryresep);
									$total_harga_resep = 0;
									?>

									<tr>
										<td class="p-3 border-b"><?= $data['nama_pasien']; ?></td>
										<td class="p-3 border-b"><?= $data['nama_dokter']; ?></td>
										<td class="p-3 border-b"><?= $data['tensi']; ?></td>
										<td class="p-3 border-b"><?= $data['keluhan']; ?></td>
										<td class="p-3 border-b"><?= $data['diagnosa']; ?></td>
										<td class="p-3 border-b">
											<table class="table">
												<?php foreach ($queryresep_run as $data1) : ?>
													<tr>
														<td><?= $data1['nama_obat']; ?></td>
														<td><?= $data1['aturan_obat']; ?></td>
													</tr>
													<?php
														$harga_resep = $data1['harga'] * $data1['jumlah_obat'];
														$total_harga_resep += $harga_resep;
													?>
												<?php endforeach ?>
											</table>
											<div class="total-resep mb-4">
												Harga Resep : Rp. <?= number_format($total_harga_resep); ?>
											</div>

											<?php
												$id_pemeriksaan = $data['id_pemeriksaan'];
												$query_update_pemeriksaan = "UPDATE pemeriksaan SET harga_resep = $total_harga_resep WHERE id_pemeriksaan = $id_pemeriksaan";
												$result_update_pemeriksaan = mysqli_query($conn, $query_update_pemeriksaan);
											?>

											<a href="form-resep.php?id_pemeriksaan=<?= $data['id_pemeriksaan']; ?>" class="text-blue-700 font-medium underline">+ Add Resep</a>
										</td>
									</tr>

							<?php
								}
							} else {
								echo "<h5>No Record Found</h5>";
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
