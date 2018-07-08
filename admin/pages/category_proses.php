<?php

include("../../function/connection.php");
include("../../function/function.php");

global $dbh;

$action = $_GET['action'];
$id = isset($_GET['id']) ? $_GET['id'] : false;

if($action == "input"){
	$category = isset($_POST['category']) ? $_POST['category'] : false;

	if($category != false){
		$query = $dbh->query("INSERT INTO category VALUES ('','$category')");
		$dbh = null;

		header("location:".URL."admin/index.php?module=category&notif=success");
	}else {
		header("location:".URL."admin/index.php?module=category&notif=failed");
	}

	
}else if($action == "delete"){
	$dbh->query("DELETE FROM category WHERE id = '$id' ");
	$dbh = null;
	header("location:".URL."admin/index.php?module=category&notif=success");
}else if($action == "select-data"){

	$query = $dbh->query("SELECT * FROM category WHERE id = '$id'");
	$row = $query->fetch(PDO::FETCH_OBJ);
	$data = $row->category_name;
	header("location:".URL."admin/index.php?module=category&data=".$data."&id=".$id);

}else if($action == "update"){
	$category = isset($_POST['category']) ? $_POST['category'] : false;
	$idUpdate = isset($_POST['idUpdate']) ? $_POST['idUpdate'] : false;
	$query = $dbh->query("UPDATE category SET category_name	= '$category' WHERE id = '$idUpdate' ");
	header("location:".URL."admin/index.php?module=category&notif=success");
	if(!$query){
		print_r($dbh->errorInfo());
	}
}


?>