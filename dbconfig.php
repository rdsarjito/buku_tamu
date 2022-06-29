<?php 
	$DB_host = "localhost";
	$DB_user = "root";
	$DB_pass = "";
	$DB_name = "buku_tamu";

	try {
		$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	include_once 'class.buku.php';
	$buku = new buku_tamu($DB_con);

?>