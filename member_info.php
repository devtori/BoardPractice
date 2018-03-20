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

      <div class="indexbox">
        <h1>회원 관리 페이지</h1>
        <h4>회원의 정보를 확인하고 탈퇴 처리할 수 있는 페이지입니다.</h4>
      </div>
      <hr>



                <?php


                if(!isset($_SESSION['admin_permit']) || $_SESSION['admin_permit']!=2 ){
                  echo "<div class=\"container\">";
                  echo "<div class=\"row\">";
                  echo "<div class=\"col-sm-4\"></div>";
                  echo "<div class=\"col-sm-4\">";
                  echo "<div class=\"logincheck\">";
                  echo "<h2>";

                  echo "</br><p> 관리자만 접근 가능합니다. </br></br></p>";
                  echo "</h2>";
                  echo "</div>";
                  echo "</div>";
                  echo "<div class=\"col-sm-4\"></div>";
                  echo "</div>";
                  echo "</div>";

                } else {
                  ?>
                  <div class="noticebox">
  									<div id="notice_area">
  										<table class="table table-striped table-hover table-bordered">
  											<thead class="thead-dark">
  												<tr>
  													<th width="10">아이디</th>
  													<th width="300">이름</th>
  													<th width="100">학번</th>
  													<th width="100">이메일</th>
  													<th width="80">회원등급</th>
                            <th width="80">탈퇴</th>
  												</tr>
                        </thead>
              <?php
                    while ($member = mysqli_fetch_array($result)){
               ?>
               <tbody>
                 <tr>
                   <td width="30" style="text-align:center"><?= $member["id"] ?></td>
                   <td width="30" style="text-align:center"><?= $member["name"] ?></td>
                   <td width="120" style="text-align:center" ><?= $member["studentID"] ?></td>
                   <td width="100" style="text-align:center"><?= $member["email"] ?></td>
                   <td width="40" style="text-align:center">
                     <a href="member_info_change.php?id=<?php echo $member['id']; ?>"><?= $member["permit"] ?></a></td>
                    <td width="40" style="text-align:center">
                       <a href="member_info_delete.php?id=<?php echo $member['id']; ?>"><?= "강제 탈퇴" ?></a></td>

                 </tr>
               </tbody>

              <?php
                      }
               ?>
                  </table>

              <?php
                }
                ?>


    </body>

</html>
