<?php

require_once("../session_check.php");

if ($sessionStatus == false) {
	header("Location: ../dashboard/index.php");
}

require_once("../connection.php");

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}else{
	echo "ID Barang Tidak ditemukan! <a href='../dashboard/index.php'>Kembali</a>";
	exit();
}

$query = "DELETE FROM barang WHERE id = '{$id}'";
$result = mysqli_query($mysqli, $query);

if (!$result) {
	exit("Gagal menghapus data!");
}
header("Location: ../dashboard/index.php");

?>