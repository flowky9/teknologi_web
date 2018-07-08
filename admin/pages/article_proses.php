<?php

date_default_timezone_set('Asia/Jakarta');
include("../../function/connection.php");
include("../../function/function.php");
$action = isset($_GET['action']) ? $_GET['action'] : false;
$title = $_POST['title'];
$id_category = $_POST['category'];
$category = $_POST['category'];
$image = $_FILES['image']['name'];
$image = replace_kalimat($image);
$description = $_POST['description'];
$date = date("Y-m-d H:i:s");
$id = $_GET['id'];

if($action == "input"){
	$query = $dbh->query("INSERT INTO post VALUES ('','$id_category','$title','$description','$date','$image','')");
	print_r($dbh->errorInfo());
	if($query->rowCount()>0){
		echo "query berhasil";
	}
	move_uploaded_file($_FILES['image']['tmp_name'],"../../assets/img/".$image);
	header("location:".URL."admin/index.php?module=article&notif=success");
}else if($action == "delete"){
	$query = $dbh->query("DELETE FROM post WHERE id = '$id' ");
	header("location:".URL."admin/index.php?module=article&notif=success");
}else if($action == "update"){
	$query = $dbh->query("UPDATE post SET category_id = '$id_category', date = '$date', title = '$title', description = '$description', image = '$image' WHERE id = '$id'");
	print_r($dbh->errorInfo());
	if($query->rowCount()>0){
		echo "query berhasil";
	}
	move_uploaded_file($_FILES['image']['tmp_name'],"../../assets/img/".$image);
	header("location:".URL."admin/index.php?module=article&notif=success");
}




?>