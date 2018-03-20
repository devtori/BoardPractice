<?php
session_start();
$conn=mysqli_connect("localhost","root","","project");
	if(!$conn){
		die("Connection failed : ".mysqli_connect_error());
	}

	header('Content-Type: text/html; charset=utf-8');

	$bno = $_SESSION['modify_idx'];
	$sql = "select * from board where idx='$bno'";
	$result = mysqli_query($conn,$sql);
	$board = mysqli_fetch_array($result);

$sql2 = "update board set content='".$_POST['content']."' where idx='".$bno."'";
$result2 = mysqli_query($conn,$sql2);
echo "<script>alert('수정되었습니다.');</script>";
?>

 <meta http-equiv="refresh" content="0 url=/boardindex.php" />
