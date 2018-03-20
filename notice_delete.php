<?php
session_start();
$conn=mysqli_connect("localhost","root","","project");
	if(!$conn){
		die("Connection failed : ".mysqli_connect_error());
	}

	header('Content-Type: text/html; charset=utf-8');

	$bno = $_GET['idx'];
	$sql = "delete from notice where idx='$bno'";
	$result = mysqli_query($conn,$sql);
	echo "<script>alert('삭제되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../../index.php" />
