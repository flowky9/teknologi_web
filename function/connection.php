<?php 

$server = "localhost";
$username = "root";
$password = "";
$db = "myblog";

try {

	$dbh = new PDO("mysql:host=$server;dbname=$db",$username,$password);

	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOexception $e){
	echo "Gagal Melakukan Koneksi ke Database : ". $e->getMessage();
	die();
}


 ?>