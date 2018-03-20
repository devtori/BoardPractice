<?php
    session_start();

    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
        echo "<p>로그인을 해 주세요. <a href=\"login.php\">[로그인]</a></p>";
    } else {



      $conn=mysqli_connect("localhost","root","","project");
      if(!$conn){
           die("Connection failed : ".mysqli_connect_error());
        }
      }

      $user_id=$_GET['id'];
      $_SESSION['member_id']=$user_id;
?>




<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>공지사항</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="css/cssbutton.css">
<link rel="stylesheet" href="css/cssmain.css">
<link rel="stylesheet" href="css/cssnavbar.css">
<link rel="stylesheet" href="css/csstable.css">

<script src="js/bootstrap.js"></script>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

    <head>
        <meta charset="utf-8" />
        <title>DBTeam05</title>
    </head>


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
            <li class="nav-item">
              <a class="nav-link" href="./notice.php">Notice</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./boardindex.php">Board</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./mypage.php">My Page</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="./member_info.php">Member Info <span class="sr-only">(current)</span></a>
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



      <div class="container">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <div class="deletecheck">
              <h2></br></br></br><?=$user_id ?>의 등급을 관리자로 변경하시겠습니까?</br></br></br></br>
                <form method='POST' action='member_info_change_ok.php'>
                <input type='radio' id='manager' name='recheck' value='yes' /><label for='yes'>&emsp;예 &emsp;&emsp;&emsp;&emsp; </label>
                <input type='radio' id='user' name='recheck' value='no' checked='checked' /><label for='no'>&emsp;아니오</br></label>
                </br></br>
                <input type="submit" value="제출" button type="button" class="btn btn-primary"></button>
              </h2>
            </div>
          </div>
        <div class="col-sm-4"></div>
      </div>
    </div>


<?php
      mysqli_close($conn);
      ?>























  </form>
  </body>
</html>
