<?php

require_once("../session_check.php");

if ($sessionStatus == false) {
	header("Location: ../dashboard/login.php");
}

require_once("../connection.php");

if (isset($_POST['ourstory']) && isset($_POST['ourmenu'])) {
	$ourstory = $_POST['ourstory'];
	$ourmenu = $_POST['ourmenu'];
}else{
	$error = 1;
}

$query = "SELECT * FROM barang WHERE id = '1'";
$result = mysqli_query($mysqli, $query);

$query = "UPDATE about SET 
		ourstory = '{$ourstory}',
		ourmenu = '{$ourmenu}'
	WHERE id = '1' ";

$insert = mysqli_query($mysqli, $query);

if ($insert == false) {
	echo "Error dalam mengubah data. <a href='../dashboard/dashformabout.php'>Kembali</a>";
}else{
	header("Location: ../dashboard/dashformabout.php");
}


?>