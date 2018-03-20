<?php
    session_start();

    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
        echo "<p>로그인을 해 주세요. <a href=\"login.php\">[로그인]</a></p>";
    } else {

      $user_id=$_SESSION['user_id'];

      $conn=mysqli_connect("localhost","root","","project");
      if(!$conn){
           die("Connection failed : ".mysqli_connect_error());
        }

      $sql="SELECT * from member where id='".$user_id."'";
      $result=mysqli_query($conn,$sql);
      $count=mysqli_num_rows($result);
      //echo $count;

      if($count==1){
        while($row=mysqli_fetch_array($result)){
          $user_id= $row['id'];
          $user_pw=$row['pwd'];
          $user_name=$row['name'];
          $user_stdID=$row['studentID'];
          $user_email=$row['email'];
        }
      }else{
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('오류가 발생했습니다. 다시 시도해주세요.');";
        echo "window.location.replace('mypage.php');</script>";
        exit;
      }
      mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="css/cssbutton.css">
<link rel="stylesheet" href="css/cssmain.css">
<link rel="stylesheet" href="css/cssnavbar.css">

<script src="js/bootstrap.js"></script>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


  <head>
    <meta http-equiv="content-type" content="text/html"; charset="utf-8">
    <title>회원정보 수정</title>
  </head>
  <script type="text/javascript">
  <!--
  function checkAddressForm() {
    if (document.memForm.pass.value== "") {
      alert("비밀번호를 입력하세요.");
      document.memForm.pass.focus();
      return false;
    }
    return true;
  }
  -->
  </script>
  <body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
      <a class="navbar-brand">DBTeam05</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./notice.php">Notice <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./boardindex.php">Board</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./mypage.php">My Page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./member_info.php">Member Info</a>
          </li>
        </ul>
        <div class="navbutton">
          <?php
          if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
            echo "<form method=\"post\" action=\"login.php\">";
            echo "<input type=\"submit\" value=\"LOGIN\" button type=\"button\" class=\"btn btn-secondary\"></button>";
            echo "</form>";
          } else {
            echo "<form method=\"post\" action=\"logout.php\">";
            echo "<input type=\"submit\" value=\"LOGOUT\" button type=\"button\" class=\"btn btn-secondary\"></button>";
            echo "</form>";
          }
          ?>
        </div>
      </div>
    </nav>

    <div class="indexbox">
      <h1>회원정보 수정</h1>
      <h4>본인의 정보를 수정합니다.</h4>
    </div>
    <hr>




    <div class="container">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="infochangebox">

          <form action="my_info_change_ok.php" method="post" name="memForm" id="memForm" onsubmit="return checkAddressForm();">
            <table>
              <h3>회원정보 수정</h3>
            </br>
              <tr>
                <td>아이디&emsp;</td>
                <td><?= $user_id?></td>
              </tr>
              <tr>
                <td>비밀번호&emsp;</td>
                <td> <input type="password" name="pwd" id="pwd" size="20" maxlength="20"/> </td>
              </tr>
              <tr>
                <td>이름&emsp;</td>
                <td><?= $user_name?></td>
              </tr>
              <tr>
                <td>학번&emsp;</td>
                <td><?= $user_stdID?></td>
              </tr>
              <tr>
                <td>이메일&emsp;</td>
                <td><input type="text" name="email" id="email" size="20" maxlength="20"/></td>
              </tr>
              </table>
            </br>
</div>

                <div class="col-sm-3">
                  <div class="writebtn">
                  <form method="post" action="my_info_change_ok.php" name="memForm" id="memForm" onsubmit="return checkAddressForm();">
                  <p align="right"></br><input type="submit" name="submit" value="수정" button type="button" class="btn btn-primary"></button></p>
                  </form>
                  </div>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                  <div class="writebtn">
                  <form method="post" action="my_info_change.php" >
                  <p align="right"></br><input type="reset" name="reset" value="초기화" button type="button" onClick="window.location.reload()" class="btn btn-primary"></button></p>
                  </form>
                  </div>
                </div>


          </form>

        </div>
      <div class="col-sm-4"></div>
    </div>
  </div>






  </body>
</html>
