<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}

$current_page = 'transaksi';
?>

<!-- Main Content -->
<main class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-72 bg-gray-800 text-white">
        <?php include '../components/sidebar.php'; ?>
    </div>

<!-- Konten Utama -->
	<div class="flex-1 p-6">
		<section>
            <div class="flex justify-between items-center">
                <p class="text-xl text-gray-700 font-bold mt-24">TRANSACTION</p>  
                <a href="add.php" class="bg-blue-500 text-white font-medium py-1 px-2 rounded-lg hover:bg-blue-700 transition mt-24 mb-2">
                    + Add Data
                </a>
            </div>

				<div class="overflow-x-auto mt-4">
					<table class="min-w-full bg-white border border-gray-100 rounded-lg overflow-hidden border-separate" style="border-spacing: 0">
						<thead>
							<tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal border-b border-gray-200 text-left">
								<th class="py-2 px-4 border-b">Nama Pasien</th>
								<th class="py-2 px-4 border-b">Biaya Resep</th>
								<th class="py-2 px-4 border-b">Biaya Dokter</th>
								<th class="py-2 px-4 border-b">Total Bayar</th>
							</tr>
						</thead>
						<tbody class="text-gray-700 text-base font-normal">
                            <?php 
                                include '../connect.php';
                                    $query = "SELECT * FROM pembayaran
									INNER JOIN pemeriksaan ON pemeriksaan.id_pemeriksaan = pembayaran.id_pemeriksaan
									INNER JOIN pasien ON pemeriksaan.id_pasien = pasien.id_pasien";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $data)
                                        {
											 $total_bayar = $data['jasa_dokter'] + $data['harga_resep'];
                                            ?>
                                            <tr>
                                                <td class="p-3 border-b"><?= $data['nama_pasien']; ?></td>
												<td class="p-3 border-b">Rp.<?= number_format($data['harga_resep']); ?></td>
												<td class="p-3 border-b">Rp.<?= number_format($data['jasa_dokter']); ?></td>
												<td class="p-3 border-b">Rp.<?= number_format($data['total_bayar']); ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
		</div>
	</body>
</html>
