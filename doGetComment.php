<?php

include_once("function/connection.php");

$id = $_GET['post_id'];
$queryResult = $dbh->query("SELECT * FROM comment WHERE status = 'on' AND post_id = '$id' ORDER BY id DESC");

$result = array();
while($fetchData = $queryResult->fetch(PDO::FETCH_ASSOC)){
		$result[] = $fetchData;
}


echo json_encode($result);


?>