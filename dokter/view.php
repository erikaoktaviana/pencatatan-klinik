<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Dashboard for ShoSo Marketplace" />
		<meta name="author" content="" />

		<title>Klinik Dokter Sri Wahjono</title>

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
					<p class="tagline-store">Klinik Dokter Sri Wahjono</p>
				</div>
			</div>
			<hr />
			<nav class="menu flex-fill">
				<div class="section-menu">
					<a href="../pasien/view.php" class="item-menu" onclick="handleClickMenu(this)">
						<img src="../assets/images/patient.svg" alt="Pasien" />
					<p>Data Pasien</p>
					</a>
					<a href="../pasien/view.php" class="item-menu active" onclick="handleClickMenu(this)">
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
					<a href="../transaksi/view.php" class="item-menu" onclick="handleClickMenu(this)">
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
				<p>©2022 Klinik Dokter Sri Wahjono.</p>
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
							<p class="title-content mb-2">Data Dokter</p>
						</div>
					</div>
				</nav>

				<div class = "row">
				<div class="g-start-3 mt-2 mb-3">
                    <a href="add.php" class="btn btn-cancel btn-transparent float-end"
                    style="background-color: #2579D1;color: white;"> Add Data</a>
				</div>
				</div>
				<div class="co-12">
				<div class = "document-card">
				<div class="table-responsive mb-lg-4">
					<table class="table">
						<thead style="background-color: #FFFFFF; color: #1e2122;">
							<tr>
								<th scope="col">Nama Dokter</th>
								<th scope="col">Telp</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody style="background-color: #FFFFFF; color: #1e2122;">
                                <?php 
                                include '../connect.php';
                                    $query = "SELECT * FROM dokter";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $data)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $data['nama_dokter']; ?></td>
                                                <td><?= $data['telp']; ?></td>
                                                <td>
                                                    <a href="form-update.php?id_dokter=<?= $data['id_dokter']; ?>"class="icon-link mx-2" >
															<img src="../assets/images/edit.svg" alt="Pasien" />
													</a>
													<a href="delete.php?id_dokter=<?= $data['id_dokter']; ?>" class="icon-link">
														<img src="../assets/images/Delete.svg" alt="Pasien" />
													</a>

                                                </td>
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
		</main>
		<script src="../js/index.js"></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
			crossorigin="anonymous"
		></script>
	</body>
</html>
