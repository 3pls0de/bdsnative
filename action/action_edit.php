<?php

require_once("../session_check.php");

if ($sessionStatus == false) {
	header("Location: login.php");
}

require_once("../connection.php");

if (isset($_POST['id'])) {
	$id = $_POST['id'];
}else{
	echo "ID Barang Tidak ditemukan! <a href='../dashboard/index.php'>Kembali</a>";
	exit();
}
if (isset($_POST['tipe_produk']) && isset($_POST['nama_produk']) && isset($_POST['detail_komposisi']) && isset($_POST['harga_produk']) && isset($_POST['ukuran_kemasan'])) {
	$tipe_produk = $_POST['tipe_produk'];
	$nama_produk = $_POST['nama_produk'];
	$detail_komposisi = $_POST['detail_komposisi'];
	$harga_produk = $_POST['harga_produk'];
	$ukuran_kemasan = $_POST['ukuran_kemasan'];
}else{
	$error = 1;
}

$query = "SELECT * FROM barang WHERE id = '{$id}'";
$result = mysqli_query($mysqli, $query);

foreach ($result as $barang) {
	$foto = $barang["foto_produk"];
}

// FOto
$files = $_FILES['foto_produk'];
$files['name'] = str_replace(" ","%20", $files['name']);
$path = "fotoProduk/";

if (!empty($files["name"])) {
	$filepath = $path . $files["name"];
	$upload = move_uploaded_file($files["tmp_name"], "../storage/" . $filepath);
	if ($upload) {
		unlink("../storage/".$foto);
	}
} else {
	$filepath = $foto;
	$upload = false;
}

// Menangani Error saat Upload
if ($upload != true && $filepath != $foto) {
	exit("Gagal Mengupload File. <a href='index.php'>Kembali</a>");
}

$query = "UPDATE barang SET 
		nama_produk = '{$nama_produk}',
		detail_komposisi = '{$detail_komposisi}',
		harga_produk = '{$harga_produk}',
		ukuran_kemasan = '{$ukuran_kemasan}',
		foto_produk = '{$filepath}'
	WHERE id = '{$id}' ";

$insert = mysqli_query($mysqli, $query);

if ($insert == false) {
	echo "Error dalam mengubah data. <a href='index.php'>Kembali</a>";
}else{
	header("Location: ../dashboard/index.php");
}


?>