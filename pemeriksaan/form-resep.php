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
			<p class="text-gray-700 text-lg font-semibold mt-20 ml-12" >Add recipe data</p>
		<div class="bg-white rounded-2xl shadow-md max-w-xl p-6  ml-12 mt-4">
            <form action="save-resep.php" method="POST">
                    <input type="hidden" name="id_pemeriksaan" value="<?= $_GET['id_pemeriksaan']; ?>">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1" >Nama Obat</label>                                
            	<select name="id_obat" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option>Pilih Obat</option>
                    <?php 
                    include '../connect.php';

                        $query = "SELECT * FROM obat";
                         $query_run = mysqli_query($conn, $query);

                         if(mysqli_num_rows($query_run) > 0)
                            {
                            	while($data = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                         <option value="<?= $data['id_obat']; ?>"><?= $data['nama_obat']; ?></option>
                        <?php
                        	 }
                            }
                         ?>

                    </select>
            </div>
                        
            <div class="mb-4">
                 <label class="block text-sm font-medium text-gray-700 mb-1" >Aturan Obat</label>
                <input type="text" name="aturan_obat" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
             </div>
            <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" >Jumlah Obat</label>
                     <input type="text" name="jumlah_obat" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
            </div>
			<div class="flex justify-between items-center">
				<a href="view.php" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-6 py-1 rounded-lg">Cancel</a>
				<button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-1 rounded-lg">Save</button>
			</div>
        </form>
     </div>
	</div>
</section>
</main>
</body>
</html>
