<?php
session_start();


$user_id = $_SESSION['user_id'];
$pass = $_POST['user_pw'];

$conn=mysqli_connect("localhost","root","","project");
if(!$conn){
     die("Connection failed : ".mysqli_connect_error());
  }



if(!$pass){
	header("Content-Type: text/html; charset=UTF-8");
	echo "<script>alert('비밀번호를 입력해주세요.');history.back();</script>";
	exit;
}



$sql="SELECT (CASE pwd WHEN sha1('$pass') THEN '1' ELSE '0' END) AS check_pw FROM member WHERE id='$user_id'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

if($count==1){
  while($row=mysqli_fetch_array($result)){
    if($row['check_pw']!=1){
      header("Content-Type: text/html; charset=UTF-8");
      echo "<script>alert('비밀번호가 맞지 않습니다.');history.back();</script>";
      echo "window.location.replace('mypage.php');</script>";
      exit;
    }else{
      echo "<script>window.location.replace('mypage_checked.php');</script>";
      exit;
    }
  }
}else{
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('연결이 불안합니다. 관리자에게 문의해주세요.');";
  echo "window.location.replace('mypage.php');</script>";
  exit;
}

?>
