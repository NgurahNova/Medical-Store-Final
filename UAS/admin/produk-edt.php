<?php

if (isset($_REQUEST['id'])) {

	$id = $_REQUEST['id'];

	$result = mysqli_query($con, "SELECT * FROM produk WHERE id_produk=$id");

	while ($data = mysqli_fetch_array($result)) {
		$nama = $data['nama_produk'];
		$deskripsi = $data['deskripsi_produk'];
		$harga = $data['harga'];
		$gambar = $data['gambar'];
		$stok = $data['stok'];
	}

	?>

	<div class="row justify-content-between">
		<div class="col-10"><b>Edit Produk </b></div>
	</div>

	<hr>

	<form action="index.php?page=produk-edt" method="post" enctype="multipart/form-data">

		<table class="table table-sm table-borderless">
			<tr>
				<td width="10%">Nama</td>
				<td><input class="form-control form-control-sm" type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr>
				<td>Deskripsi Produk</td>
				<td><input class="form-control form-control-sm" type="text" name="deskripsi" value="<?php echo $deskripsi; ?>"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input class="form-control form-control-sm" type="number" name="harga" value="<?php echo $harga; ?>"></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>
					<img src="../obat/<?php echo $gambar; ?>" class="mb-2" alt="..." width="300" height="300">
					<input class="form-control form-control-sm form-control-file" type="file" name="gambar">
					<input type="hidden" name="nm_gambar" value="<?php echo $gambar; ?>">
					<input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>">
					<input type="hidden" name="id_produk" value="<?php echo $id; ?>">
				</td>
			<tr>
				<td>Stok</td>
				<td><input class="form-control form-control-sm" type="number" name="stok" value="<?php echo $stok; ?>"></td>
			</tr>
			</tr>
			<tr>
				<td></td>
				<td><input class="btn btn-dark btn-sm" type="submit" name="submit" value="submit"></td>
			</tr>
		</table>
	</form>

<?php } ?>

<?php

if (isset($_POST['submit'])) {
	$id_produk = $_POST['id_produk'];
	$nama_produk = $_POST['nama'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];
	$nm_gambar = $_POST['nm_gambar'];

	$uploadDir = "../obat/";
	$gambarPath = $uploadDir . basename($_FILES["gambar"]["name"]);
	move_uploaded_file($_FILES["gambar"]["tmp_name"], $gambarPath);

	$gambar = $_FILES["gambar"]["name"];

	if ($gambar == "") {
		$gambar = $nm_gambar;
	}

	$result = mysqli_query($con, "UPDATE produk SET nama_produk='$nama_produk', stok='$stok', harga='$harga', gambar='$gambar' WHERE id_produk=$id_produk");

	header("Location: index.php?page=produk");
}
?>