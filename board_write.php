<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!doctype html>
<html lang="ko">
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


      <div class="indexbox">
       <h1>자유게시판</h1>
       <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
      </div>
      <hr>


        <div class="board_write">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <form action="board_write_ok.php" method="post">
                    <table id="boardWrite">
                        <tr>
                            <td class="tb"><label for="uname">이름&emsp;&emsp;</label></td>
                            <td height="30"><?php echo $user_id; ?></td>
                        </tr>
                        <tr>
                            <td class="tb"><label for="utitle">제목&emsp;&emsp;</label></td>
                            <td height="30"><input type="text" name="title" id="utitle" size="48"/></td>
                        </tr>
                        <tr>
                            <td class="tb"><label for="ucontent">내용&emsp;&emsp;</label></td>
                            <td height="30"><textarea name="content" id="ucontent" rows="10" cols="47"></textarea></td>
                        </tr>
                    </table>
                <div class="bt_se text-center">
                    <input type="submit" value="작성" button type="button" class="btn btn-primary"></button>
                </div>
            </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </body>
</html>
