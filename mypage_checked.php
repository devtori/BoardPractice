<!DOCTYPE html>
<?php session_start();
$conn=mysqli_connect("localhost","root","","project");
  if(!$conn){
    die("Connection failed : ".mysqli_connect_error());
  }

  $sql="SELECT id,name, studentID, email,permit FROM member";
  $result=mysqli_query($conn,$sql);

?>
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
            <li class="nav-item active">
              <a class="nav-link" href="./mypage.php">My Page <span class="sr-only">(current)</span></a>
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
        <h1>마이 페이지</h1>
        <h4>사용자의 정보를 수정할 수 있는 공간입니다.</h4>
      </div>
      <hr>

      <?php

      if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
        echo "<div class=\"logincheck\">";
        echo "<h2>";
        echo "</br><p> 로그인을 해 주세요. </br></br></p>";
        echo "<p><form method=\"post\" action=\"login.php\"></p>";
        echo "<p align=\"center\"></br><input type=\"submit\" value=\"LOGIN\" button type=\"button\" class=\"btn btn-primary\"></button></p>";
        echo "</form>";
        echo "</h2>";
        echo "</div>";
      } else {
        echo "<div class=\"myinfo\">";
        echo "<h3>";
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        echo "<p><strong>$user_name</strong>($user_id)님의 개인정보</br></br></p>";
        echo "</h3>"
        ?>

      <h1>
      <p>ID : <?php echo $_SESSION['user_id'] ?></p>
        <p>이름 : <?php echo $_SESSION['user_name'] ?></p>
        <p>학번 : <?php echo $_SESSION['studentID'] ?></p>
        <p>e-mail : <?php echo $_SESSION['user_mail'] ?></br></br></br></p>
      </h1>

        <div class="navbutton">
          <form method="post" action="my_info_change.php">
            <input type="submit" value="CHANGE" button type="button" class="btn btn-primary"></br></br></button>
          </form>
          <form method="post" action="my_info_delete.php">
            <input type="submit" value="DELETE" button type="button" class="btn btn-primary"></button>
          </form>
        </div>
      </div>
    <?php  } ?>



    </body>



</html>
