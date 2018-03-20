<?php
session_start();
$conn=mysqli_connect("localhost","root","","project");
	if(!$conn){
		die("Connection failed : ".mysqli_connect_error());
	}

	header('Content-Type: text/html; charset=utf-8');

	$bno = $_GET['idx'];

	$sql = "delete from board where idx='$bno'";
	$result = mysqli_query($conn,$sql);

	$sql2 = "delete from comment where bid='$bno'";
	$result2 = mysqli_query($conn, $sql2);

	echo "<script>alert('삭제되었습니다.');</script>";

?>
<meta http-equiv="refresh" content="0 url=../../boardindex.php" />
