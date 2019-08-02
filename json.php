<!DOCTYPE html>
<html>

<body>

<h4>tampilan format json tabel Buku</h4>
<?php
include'koneksi.php';

$query = mysqli_query($koneksi1, 'select * from buku');

if (mysqli_num_rows($query) > 0) {
	# buat array
	$responsistem = array();
	$responsistem["data"] = array();
	while ($row = mysqli_fetch_assoc($query)) {
		# kerangka format penampilan data json
		$data['id'] = $row["idbuku"];
		$data['nama'] = $row["judul"];
		$data['harga'] = $row["harga_jual"];
		array_push($responsistem["data"], $data);
	}
	echo json_encode($responsistem);
} else {
	# menmapilkan pesan jika tidak ada data dalam tabel
	$responsistem["message"]="tidak ada data";
	echo json_encode($responsistem);
}
?>

<h4>tampilan format json tabel Distributor</h4>
<?php
include'koneksi.php';

$query = mysqli_query($koneksi1, 'select * from distributor');

if (mysqli_num_rows($query) > 0) {
	# buat array
	$responsistem = array();
	$responsistem["data"] = array();
	while ($row = mysqli_fetch_assoc($query)) {
		# kerangka format penampilan data json
		$data['id'] = $row["iddistributor"];
		$data['nama'] = $row["namadistributor"];
		$data['alamat'] = $row["alamat"];
		$data['telepon'] = $row["telepon"];
		array_push($responsistem["data"], $data);
	}
	echo json_encode($responsistem);
} else {
	# menmapilkan pesan jika tidak ada data dalam tabel
	$responsistem["message"]="tidak ada data";
	echo json_encode($responsistem);
}
?>
</body>
</html>
