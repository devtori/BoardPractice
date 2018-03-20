<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
$conn=mysqli_connect("localhost","root","","project");
if(!$conn){
  die("Connection failed : ".mysqli_connect_error());
}


$date = date('Y-m-d');
$sql = "insert into notice(name,pw,title,content,date) values('".$_SESSION['user_id']."','".$_SESSION['user_pwd']."','".$_POST['title']."','".$_POST['content']."','".$date."')";
$result = mysqli_query($conn,$sql);

echo "<script>alert('글쓰기 완료되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=/notice.php" />
