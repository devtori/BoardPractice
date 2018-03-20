<?php

    $user_id = $_POST['id'];
    $user_pw = $_POST['pass1'];
    $user_pwcheck = $_POST['pass2'];
    $user_name = $_POST['name'];
    $user_studentID = $_POST['studentID'];
    $user_email = $_POST['email'];

    $conn=mysqli_connect("localhost","root","","project");
    if(!$conn){
         die("Connection failed : ".mysqli_connect_error());
    }

    if(!$user_id||!$user_pw||!$user_pwcheck||!$user_name||!$user_studentID||!$user_email){
      header("Content-Type: text/html; charset=UTF-8");
      echo "<script>alert('모두 입력해주세요.');";
      echo "window.location.replace('join.php');</script>";
      exit;
    }

    $sql1 = "SELECT id FROM member WHERE id='$user_id'";
    $result1 = mysqli_query($conn,$sql1);
    $count1 = mysqli_num_rows($result1);

    if($count1>=1){
      header("Content-Type: text/html; charset=UTF-8");
      echo "실패원인:".mysqli_error($conn);
      echo "<script>alert('회원가입에 실패하셨습니다(아이디 중복). 다시 입력해주세요');";
      echo "window.location.replace('join.php');</script>";
      exit;
    }
    elseif($user_pw!=$user_pwcheck){
      header("Content-Type: text/html; charset=UTF-8");
      echo "실패원인:".mysqli_error($conn);
      echo "<script>alert('회원가입에 실패하셨습니다(비밀번호 불일치). 다시 입력해주세요');";
      echo "window.location.replace('join.php');</script>";
      exit;
    }

    $sql2="INSERT INTO member VALUES ('".$user_id."', sha1('".$user_pw."'),'".$user_name."','".$user_studentID."','".$user_email."',1)";
    $result2=mysqli_query($conn,$sql2);

    if($result2){
      header("Content-Type: text/html; charset=UTF-8");
      echo "<script>alert('회원가입이 완료되었습니다. 로그인 해주세요.');";
      echo "window.location.replace('login.php');</script>";
      exit;
    }else{
      header("Content-Type: text/html; charset=UTF-8");
    echo "실패원인:".mysqli_error($conn);
    echo "<script>alert('회원가입에 실패하셨습니다. $id_check 다시 입력해주세요');";
    echo "window.location.replace('join.php');</script>";
    }


?>
