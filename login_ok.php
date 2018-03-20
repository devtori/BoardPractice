<?php
    if ( !isset($_POST['user_id']) || !isset($_POST['user_pw']) ) {
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('아이디 또는 비밀번호가 빠졌거나 잘못된 접근입니다.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];

    $conn=mysqli_connect("localhost","root","","project");
    if(!$conn){
         die("Connection failed : ".mysqli_connect_error());
      }

    $sql="SELECT id,pwd,name,studentID,email,(CASE pwd WHEN sha1('$user_pw') THEN '1' ELSE '0' END) AS check_pw, permit FROM member WHERE id='$user_id' ";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);

    if($count==1){
      while($row=mysqli_fetch_array($result)){
        if($row['check_pw']!=1){
          header("Content-Type: text/html; charset=UTF-8");
          echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.');";
          echo "window.location.replace('login.php');</script>";
          exit;
        }else{
          session_start();
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['user_pwd'] = $row['pwd'];
          $_SESSION['studentID'] = $row['studentID'];
          $_SESSION['user_name'] = $row['name'];
          $_SESSION['user_mail'] = $row['email'];
          $_SESSION['admin_permit'] = $row['permit'];
        }
      }
    }else{
      header("Content-Type: text/html; charset=UTF-8");
      echo "<script>alert('아이디가 존재하지 않습니다.');";
      echo "window.location.replace('login.php');</script>";
      exit;
    }

?>
<meta http-equiv="refresh" content="0;url=index.php" />
