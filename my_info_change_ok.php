<?php
    session_start();

    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
        echo "<p>로그인을 해 주세요. <a href=\"login.php\">[로그인]</a></p>";
    } else {

      $user_id=$_SESSION['user_id'];
      $user_pw=$_POST["pwd"];
      $user_email=$_POST["email"];

      $conn=mysqli_connect("localhost","root","","project");
      if(!$conn){
           die("Connection failed : ".mysqli_connect_error());
        }

        $sql="UPDATE member SET email='$user_email', pwd=sha1('$user_pw') WHERE id='$user_id'";
        mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn)==0){
          header("Content-Type: text/html; charset=UTF-8");
          echo "<script>alert('오류가 발생했습니다. 다시 시도해주세요.');";
          echo "window.location.replace('mypage.php');</script>";
          exit;
        }else{
          header("Content-Type: text/html; charset=UTF-8");
          echo "<script>alert('정보가 수정되었습니다. 다시 로그인해주세요');";
          echo "window.location.replace('logout.php');</script>";
          exit;
        }

      mysqli_close($conn);
    }
?>
