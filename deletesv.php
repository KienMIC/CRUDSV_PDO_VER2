<?php
include('connect.php');
$ID = $_GET['ID'];
$sql = "DELETE FROM user WHERE ID = '$ID'";
$stmt = $conn->prepare($sql);
$query = $stmt->execute();
if($query){
	header('location:index.php');
}
else{
	echo "Xoa that bai";
}
?>