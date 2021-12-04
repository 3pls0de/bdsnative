<?php

require_once("../session_check.php");

if ($sessionStatus == false) {
	header("Location: ../dashboard/index.php");
}

require_once("../connection.php");

$error = 0;
if (isset($_POST['id_tipe']) && isset($_POST['nama_tipe'])) {
	$id_tipe = $_POST['id_tipe'];
	$nama_tipe = $_POST['nama_tipe'];
}else{
	$error = 1;
	echo "Terjadi kesalahan dalam proses input data";
	exit();
}

$query = "UPDATE tipe_produk SET 
		id = '{$nama_produk}',
		detail_komposisi = '{$detail_komposisi}',
		harga_produk = '{$harga_produk}',
		ukuran_kemasan = '{$ukuran_kemasan}',
		foto_produk = '{$filepath}'
	WHERE id = '{$id}' ";

$insert = mysqli_query($mysqli, $query);

if ($insert == false) {
	echo "Error dalam menambahkan data. <a href='../dashboard/dashformTipe.php'>Kembali</a>";
}else {
	header("Location: ../dashboard/dashtipe.php");
}


?>