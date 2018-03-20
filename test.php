<!DOCTYPE html>
<?php session_start(); ?>
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
        <title>EWHA COMMUNITY</title>
    </head>


    <body>

      <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <a class="navbar-brand">Ewha</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="./login.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./notice.php">Notice</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="board/boardindex.php">Board</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./mypage.php">My Page</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./member_info.php">Member Info</a>
            </li>
          </ul>
          <div class="navbutton">
          <form method="post" action="logout.php">
            <input type="submit" value="LOGOUT" button type="button" class="btn btn-secondary"></button>
          </form>
        </div>
        </div>
      </nav>





      <div class="container">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <div class="logincheck">
              <h2>
                <?php
                if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
                  echo "</br><p> 로그인을 해 주세요. </br></br></p>";
                  echo "<p><form method=\"post\" action=\"login.php\"></p>";
                  echo "<p align=\"center\"></br><input type=\"submit\" value=\"LOGIN\" button type=\"button\" class=\"btn btn-primary\"></button></p>";
                  echo "</form>";
                } else {
                    $user_id = $_SESSION['user_id'];
                    $user_name = $_SESSION['user_name'];
                    echo "</br><p><strong>$user_name</strong>($user_id)님 환영합니다.</br></br>";
                    echo "<p><form method=\"post\" action=\"logout.php\"></p>";
                    echo "<p align=\"center\"></br><input type=\"submit\" value=\"LOGOUT\" button type=\"button\" class=\"btn btn-primary\"></button></p>";
                    echo "</form>";
                }
                ?>
              </h2>
            </div>
          </div>
        <div class="col-sm-4"></div>
      </div>
    </div>

    </body>



</html>
