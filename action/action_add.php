<?php

require_once("../session_check.php");

if ($sessionStatus == false) {
	header("Location: ../dashboard/index.php");
}

require_once("../connection.php");

$error = 0;
if (isset($_POST['tipe_produk']) && isset($_POST['nama_produk']) && isset($_POST['detail_komposisi']) && isset($_POST['harga_produk']) && isset($_POST['ukuran_kemasan'])) {
	$tipe_produk = $_POST['tipe_produk'];
	$nama_produk = $_POST['nama_produk'];
	$detail_komposisi = $_POST['detail_komposisi'];
	$harga_produk = $_POST['harga_produk'];
	$ukuran_kemasan = $_POST['ukuran_kemasan'];
}else{
	$error = 1;
}
if ($error == 1) {
	echo "Terjadi kesalahan dalam proses input data";
	exit();
}

// FOto
$files = $_FILES['foto_produk'];
$files['name'] = str_replace(" ","%20", $files['name']);
$path = "fotoProduk/";

if (!empty($files["name"])) {
	$filepath = $path . $files["name"];
	$upload = move_uploaded_file($files["tmp_name"], "../storage/" . $filepath);
} else {
	$filepath = "";
	$upload = false;
}

// Menangani Error saat Upload
if ($upload != true && $filepath != "") {
	exit("Gagal Mengupload File. <a href='index.php'>Kembali</a>");
}



$query = "INSERT INTO barang (id, tipe_produk, nama_produk, foto_produk, detail_komposisi, harga_produk, ukuran_kemasan)
		VALUES('', '{$tipe_produk}', '{$nama_produk}', '{$filepath}', '{$detail_komposisi}', '{$harga_produk}', '{$ukuran_kemasan}')";
$insert = mysqli_query($mysqli, $query);

if ($insert == false) {
	echo "Error dalam menambahkan data. <a href='../dashboard/dashform.php'>Kembali</a>";
}else {
	header("Location: ../dashboard/index.php");
}


?>