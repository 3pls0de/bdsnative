<?php

require_once("../session_check.php");

if ($sessionStatus == false) {
	header("Location: ../dashboard/index.php");
}

require_once("../connection.php");

$error = 0;
if (isset($_POST['nama_tipe'])) {
	$nama_tipe = $_POST['nama_tipe'];
}else{
	$error = 1;
	echo "Terjadi kesalahan dalam proses input data";
	exit();
}

$query = "INSERT INTO tipe_produk (id_tipe, nama_tipe)
		VALUES('', '{$nama_tipe}')";
$insert = mysqli_query($mysqli, $query);

if ($insert == false) {
	echo "Error dalam menambahkan data. <a href='../dashboard/dashformTipe.php'>Kembali</a>";
}else {
	header("Location: ../dashboard/dashtipe.php");
}


?>