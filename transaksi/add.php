<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Dashboard for ShoSo Marketplace" />
		<meta name="author" content="" />

		<title>Klinik Sri Wahjono</title>

		<link rel="stylesheet" href="../css/styles.css" />
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
			crossorigin="anonymous"
		/>
		<script
			src="https://kit.fontawesome.com/32f82e1dca.js"
			crossorigin="anonymous"
		></script>
	</head>
	<body>
		<aside class="sidebar offcanvas-lg offcanvas-start">
			<div class="d-flex justify-content-end m-4 d-block d-lg-none">
				<button
					data-bs-dismiss="offcanvas"
					data-bs-target=".sidebar"
					class="btn p-0 border-0 fs-4"
					aria-label="Button Close"
				>
					<i class="fas fa-close"></i>
				</button>
			</div>
			<div class="logo-brand mt-lg-5">
				<img
					src="../assets/images/Hospital 3.svg"
					alt="Logo Shoso"
					width="52"
					height="50"
				/>
				<div>
					<h6 class="title-store">Data Pasien Rawat Jalan</h6>
					<p class="tagline-store">Klinik Sri Wahjono</p>
				</div>
			</div>
			<hr />
			<nav class="menu flex-fill">
				<div class="section-menu">
					<a href="../pasien/view.php" class="item-menu" onclick="handleClickMenu(this)">
						<img src="../assets/images/patient.svg" alt="Pasien" />
					<p>Data Pasien</p>
					</a>
					<a href="../pasien/view.php" class="item-menu" onclick="handleClickMenu(this)">
						<img src="../assets/images/Medical Doctor.svg" alt="Pasien" />
					<p>Data Dokter</p>
					</a>
					<a href="../obat/view.php" class="item-menu" onclick="handleClickMenu(this)">
						<img src="../assets/images/obat.svg" alt="Pasien" />
						<p>Data Obat</p>
					</a>
					<a href="../pemeriksaan/view.php" class="item-menu" onclick="handleClickMenu(this)">
						<img src="../assets/images/pemeriksaan.svg" alt="Pasien" />
						<p>Data Pemeriksaan</p>
					</a>
					<a href="../transaksi/view.php" class="item-menu active" onclick="handleClickMenu(this)">
						<img src="../assets/images/Transaction active.svg" alt="Pasien" />
						<p>Data Transaksi</p>
					</a>
				</div>
			</nav>
			<footer>
				<div class="d-flex gap-3 align-items-center mt-lg-5">
					<img src="../assets/icons/ic_mode.svg" alt="Mode Display" />
					<p id="label-mode" class="flex-fill label-mode">Light Mode</p>
					<div>
						<input
							id="checkbox"
							type="checkbox"
							class="toggle-theme"
							aria-label="Toggle Theme"
						/>
						<label for="checkbox" class="label-toggle">
							<img
								src="../assets/icons/ic_moon.svg"
								width="50%"
								class="ic-theme"
								id="ic-dark"
								alt="Icon Dark"
							/>
							<img
								src="../assets/icons/ic_sun.svg"
								width="50%"
								class="ic-theme"
								id="ic-light"
								alt="Icon Light"
							/>
						</label>
					</div>
				</div>
				<p>©2022 Klinik Sri Wahjono.</p>
			</footer>
		</aside>
		<main class="content flex-fill">
			<section>
				<button
					aria-controls="sidebar"
					data-bs-toggle="offcanvas"
					data-bs-target=".sidebar"
					aria-label="Button Hamburger"
					class="sidebarOffcanvas mb-5 btn p-0 border-0 d-flex d-lg-none"
				>
					<i class="fa-solid fa-bars"></i>
				</button>
				<nav class="nav-content gap-5 mb-lg-4">
					<div class="d-flex gap-2 align-items-center">
						<div>
							<p class="title-content mb-2">Input Data Transaksi</p>
						</div>
					</div>
				</nav>
				<div class="co-12">
				<div class = "document-card">
					<div class="col mb-5 px-4">
						<form action="save.php" method="POST">
							<div class="mb-4">
								<label>Nama Pasien</label>
								<select name="id_pemeriksaan" class="form-select" required>
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
									<label>Biaya Dokter</label>
									<input type="text" name="jasa_dokter" class="form-control" autocomplete="off">
								</div>
									<div>
										<button type="submit" name="submit" class="btn btn-cancel btn-transparent mb-2 float-end" style="background-color: #2579D1;color: white;">Save</button>
										<a href="view.php" class="btn btn-cancel btn-transparent" style="background-color: #DDDDDD;color: grey;">Cancel</a>
									</div>
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
