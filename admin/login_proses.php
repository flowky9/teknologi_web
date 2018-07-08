<?php

session_start();

include("../function/connection.php");
include("../function/function.php");

$username = $_POST['username'];
$password = MD5($_POST['password']);
$query = $dbh->query("SELECT * FROM user WHERE username = '$username' AND password = '$password' ");
$row = $query->fetch(PDO::FETCH_OBJ);

if($query->rowCount() > 0 ){
	$_SESSION['username'] = $row->username;
	$_SESSION['id'] = $row->id;
	// echo $_SESSION['id'];
	// echo $_SESSION['username'];
	// echo "<pre>";
	// print_r($dbh->errorInfo());
	// echo "</pre>";
	header("location:".URL."admin");
}else {

	header("location:".URL."admin/login.php?notif=failed");
}



?>