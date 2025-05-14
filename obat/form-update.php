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

	<div class="flex-1 p-6">
		<section>
			<div class="w-full">
				<h2 class="text-gray-700 text-lg font-semibold mt-20 ml-12">Update medicine's data</h2>
            <div class="bg-white rounded-2xl max-w-xl shadow-md ml-12 p-6">
                        <?php
                         include '../connect.php';
                        if(isset($_GET['id_obat']))
                        {
                            $id_obat=$_GET['id_obat'];
                            $query = "SELECT * FROM obat WHERE id_obat='$id_obat' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $data = mysqli_fetch_array($query_run);
                                ?>
                                <form action="update.php" method="POST">
                                    <input type="hidden" name="id_obat" value="<?= $data['id_obat']; ?>">

                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Obat</label>
                                        <input type="text" name="nama_obat" value="<?=$data['nama_obat'];?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                        <input type="text" name="deskripsi" value="<?=$data['deskripsi'];?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                                        <input type="text" name="harga" value="<?=$data['harga'];?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">
                                    </div>
									<div class="flex justify-between items-center">
										<a href="view.php"
											class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-6 py-1 rounded-lg">
											Cancel
										</a>
										<button type="submit" name="update"
											class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-1 rounded-lg">
											Update
										</button>
									</div>


                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
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
