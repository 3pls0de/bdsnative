<?php

require_once("../session_check.php");

if ($sessionStatus == false) {
	header("Location: ../dashboard/login.php");
}

require_once("../connection.php");

if (isset($_POST['author']) && isset($_POST['description']) && isset($_POST['keywords']) && isset($_POST['xindex']) && isset($_POST['xfollow'])) {
	$author = $_POST['author'];
	$description = $_POST['description'];
	$keywords = $_POST['keywords'];
	$xindex = $_POST['xindex'];
	$xfollow = $_POST['xfollow'];
}else{
	$error = 1;
}

$query = "UPDATE seo SET 
		author = '{$author}',
		description = '{$description}',
		keywords = '{$keywords}',
		xindex = '{$xindex}',
		xfollow = '{$xfollow}'
	WHERE id = '1' ";

$insert = mysqli_query($mysqli, $query);

if ($insert == false) {
	echo "Error dalam mengubah data. <a href='../dashboard/dashformseo.php'>Kembali</a>";
}else{
	header("Location: ../dashboard/dashformseo.php");
}


?>