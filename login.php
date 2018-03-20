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
            <li class="nav-item active">
              <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
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

      <div class="container">
        <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
                <?php
                if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
                  echo "<div class=\"loginbox\">";
                  echo "<h1 id=\"site-name\">LOGIN</a></h1>";

                  echo "<h2>";
                  echo "<form method=\"post\" action=\"login_ok.php\">";
                  echo "<p>ID&emsp;&emsp; &emsp; &emsp;&emsp;&emsp;&emsp;<input type=\"text\" name=\"user_id\" /></p>";
                  echo "<p>PASSWORD&emsp; &emsp; &emsp;<input type=\"password\" name=\"user_pw\"/></p></h2>";
                  echo "<p align = \"center\"></br><input type=\"submit\" value=\"로그인\" button type=\"button\" class=\"btn btn-primary\"></button></p></form>";
                  echo "</div>";

                  echo "<div class=\"newjoin\">";
                  echo "<h3>";
                  echo "<form method=\"post\" action=\"join.php\">";
                  echo "<p align = \"right\"></br><input type=\"submit\" value=\"회원가입\" button type=\"button\" class=\"btn btn-primary\"></button></p>";
                  echo "</form></h3>";
                  echo "</div>";

                } else {
                  echo "<div class=\"loginbox\">";
                  echo "<h1 id=\"site-name\">LOGIN</a></h1>";
                  $user_id = $_SESSION['user_id'];
                  $user_name = $_SESSION['user_name'];
                  echo "<p align = \"center\"></br><strong>$user_name</strong>($user_id)님은 이미 로그인하고 있습니다.</br></br></p>";

                  echo "<div class=\"col-sm-6\">";
                  echo "<form method=\"post\" action=\"index.php\">";
                  echo "<p align = \"center\"><input type=\"submit\" value=\"돌아가기\" button type=\"button\" class=\"btn btn-primary\"></button></form></div></p>";

                  echo "<div class=\"col-sm-6\">";
                  echo "<form method=\"post\" action=\"logout.php\">";
                  echo "<p align = \"center\"><input type=\"submit\" value=\"로그아웃\" button type=\"button\" class=\"btn btn-primary\"></button></form></div></p></br></br></br></div>";
                } ?>
              </h2>
            </div>
        </div>
      </div>



    </body>
</html>
