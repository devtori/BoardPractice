<?php
    session_start();

    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
        echo "<p>로그인을 해 주세요. <a href=\"login.php\">[로그인]</a></p>";
    } else {

      $user_id=$_SESSION['user_id'];
      $recheck=$_POST['recheck'];

      $conn=mysqli_connect("localhost","root","","project");
      if(!$conn){
        die("Connection failed : ".mysqli_connect_error());
      }
      if ($recheck=='yes') {
        $sql2="UPDATE board SET name='UNKNOWN' WHERE name='$user_id'";
        mysqli_query($conn,$sql2);

        $sql3="UPDATE comment SET name='UNKNOWN' WHERE name='$user_id'";
        mysqli_query($conn,$sql3);

        $sql="DELETE FROM member WHERE id='$user_id'";
        mysqli_query($conn,$sql);


        if(mysqli_affected_rows($conn)==0){
          header("Content-Type: text/html; charset=UTF-8");
          echo "<script>alert('오류가 발생했습니다. 다시 시도해주세요.');";
          echo "window.location.replace('my_info_delete.php');</script>";
          exit;
        }else{
          header("Content-Type: text/html; charset=UTF-8");
          echo "<script>alert('회원정보가 삭제되었습니다. 이용해주셔서 감사합니다.');";
          echo "window.location.replace('logout.php');</script>";
          exit;
        }
      }else{
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('회원정보가 삭제되지 않았습니다.');";
        echo "window.location.replace('mypage.php');</script>";
        exit;
      }
      mysqli_close($conn);
    }
?>
