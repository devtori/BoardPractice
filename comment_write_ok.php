<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
$conn=mysqli_connect("localhost","root","","project");
if(!$conn){
  die("Connection failed : ".mysqli_connect_error());
}

 $date = date("Y-m-d H:i:s");
 $sql = "INSERT INTO comment(name,bid,content,wdate) values('".$_SESSION['user_id']."','".$_SESSION['b_no']."','".$_POST['content']."','".$date."')";
 $result = mysqli_query($conn,$sql);

$num = $_SESSION['b_no'];

 $sql2 = "UPDATE board SET cmt_cnt=cmt_cnt+1 where idx = $num ";
 $result2 = mysqli_query($conn,$sql2);

 echo "<script>alert('댓글쓰기가 완료되었습니다.');</script>";

 echo "<meta http-equiv=\"refresh\" content=\"0 url=/board_read.php?idx=$num\" />";

?>
