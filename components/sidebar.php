<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Dashboard for Klinik Dokter Sri Wahjono" />
        <title>Klinik Dokter Sri Wahjono</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/32f82e1dca.js" crossorigin="anonymous"></script>
    </head>
    <body>
		<aside class="w-72 bg-white shadow-lg h-screen fixed">
		<div class="mt-2 p-4 flex items-center">
			<img src="../assets/images/hospital.svg" alt="Logo" class="w-12 h-12" />
			<div class="ml-2">
				<p class="text-base font-medium text-gray-700">Klinik Dokter Sri Wahjono</p>
			</div>
		</div>

		<nav class="flex flex-col p-4">

			<!-- Doctor -->
			<a href="../dokter/view.php"
				class="flex items-center p-2 rounded mt-1 <?= ($current_page === 'dokter') 
					? 'bg-blue-100 text-blue-600 font-semibold' 
					: 'text-gray-700 hover:bg-blue-100' ?>">
				<img src="../assets/images/doctor.svg" class="w-8 h-8" />
				<p class="ml-4 text-base">Doctor</p>
			</a>

			<!-- Patient -->
			<a href="../pasien/view.php"
				class="flex items-center p-2 rounded mt-1 <?= ($current_page === 'pasien') 
					? 'bg-blue-100 text-blue-600 font-semibold' 
					: 'text-gray-700 hover:bg-blue-100' ?>">
				<img src="../assets/images/patient hospital.svg" class="w-8 h-8" />
				<p class="ml-4 text-base">Patient</p>
			</a>

			<!-- Medicine -->
			<a href="../obat/view.php"
				class="flex items-center p-2 rounded mt-1 <?= ($current_page === 'obat') 
					? 'bg-blue-100 text-blue-600 font-semibold' 
					: 'text-gray-700 hover:bg-blue-100' ?>">
				<img src="../assets/images/medicine.svg" class="w-8 h-8" />
				<p class="ml-4 text-base">Medicine</p>
			</a>

			<!-- Medical Record -->
			<a href="../pemeriksaan/view.php"
				class="flex items-center p-2 rounded mt-1 <?= ($current_page === 'pemeriksaan') 
					? 'bg-blue-100 text-blue-600 font-semibold' 
					: 'text-gray-700 hover:bg-blue-100' ?>">
				<img src="../assets/images/pemeriksaan.svg" class="w-8 h-8" />
				<p class="ml-4 text-base">Medical Record</p>
			</a>

			<!-- Patient Billing -->
			<a href="../transaksi/view.php"
				class="flex items-center p-2 rounded mt-1 <?= ($current_page === 'transaksi') 
					? 'bg-blue-100 text-blue-600 font-semibold' 
					: 'text-gray-700 hover:bg-blue-100' ?>">
				<img src="../assets/images/transaction.svg" class="w-7 h-7" />
				<p class="ml-4 text-base">Patient Billing</p>
			</a>

			<!-- Logout -->
			<a href="/pasien-klinik/login.php"
				class="flex items-center p-2 rounded mt-1 text-gray-700 hover:bg-blue-100">
				<img src="../assets/images/logout.svg" class="w-7 h-7" />
				<p class="ml-4 text-base">Logout</p>
			</a>

		</nav>
	</aside>
