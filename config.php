<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "project";

//$conn = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("db connect error");
//mysql_select_db($mysql_database, $conn) or die("db connect error");

$conn=mysqli_connect($mysql_hostname,$mysql_user,$mysql_password,$mysql_database);
if(mysqli_connect_error($conn)){
  echo "MYSQL 접속 실패","<br>";
  echo "오류원인 : ",mysqli_connect_error();
  exit();
}

echo "MYSQL 접속 성공";
mysqli_close($conn);
?>
