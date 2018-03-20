<!--- 게시글 수정 -->
<?php
session_start();
$conn=mysqli_connect("localhost","root","","project");
	if(!$conn){
		die("Connection failed : ".mysqli_connect_error());
	}

	header('Content-Type: text/html; charset=utf-8');

	$bno = $_GET['idx'];
	$_SESSION['modify_idx'] = $bno;
	$sql = "select * from board where idx='$bno'";
	$result = mysqli_query($conn,$sql);
	$board = mysqli_fetch_array($result);

 ?>
 <!doctype html>

 	<html lang="ko">

 	 <head>
 	  <meta charset="UTF-8">
 		<link rel="stylesheet" href="/css/bootstrap.min.css">
 		<link rel="stylesheet" href="/css/style.css">

 		<link rel="stylesheet" href="/css/cssbutton.css">
 		<link rel="stylesheet" href="/css/cssmain.css">
 		<link rel="stylesheet" href="/css/cssnavbar.css">
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
 		              <a class="nav-link" href="./login.php">Home</a>
 		            </li>
 		            <li class="nav-item">
 		              <a class="nav-link" href="./notice.php">Notice</a>
 		            </li>
 		            <li class="nav-item active">
 		              <a class="nav-link" href="./boardindex.php">Board <span class="sr-only">(current)</span></a>
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



				 <div class="container">
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-1"></div>
						<div class="col-sm-1"></div>
						<div class="col-sm-1"></div>
						<div class="col-sm-1"></div>
						<div class="col-sm-1"></div>
						<div class="col-sm-1"></div>
						<div class="col-sm-1"></div>
						<div class="col-sm-1"></div>

						<div class="col-sm-1"></div>
				 </div>

				 <div class="col-sm-1"></div>

	 <div class="board_modifybox">
		 <form action="board_modify_ok.php/<?php echo $board['idx']; ?>" method="post">
		 <table class="table table-striped table-bordered">
			 <thead class="thead-dark">
				 <tr><th colspan="4"><?php echo $board['title'];?></th></tr>
			 </thead>
				 <tbody>
					 <tr>
						 <th width="25">번호</th>
						 <td width="200"><?php echo $bno; ?></th>
						 <th width="25">작성자</th>
						 <td width="200"><?php echo $board['name'];?></th>
					 </tr>
					 <tr>
						 <th width="25">등록일</th>
						 <td width="200"><?php echo $board['date'];?></th>
						 <th width="25">조회수</th>
						 <td width="200"><?php echo $board['hit'];?></th>
					 </tr>
					 <tr>
						 <td colspan="4" height="400"><textarea name="content" id="ucontent" rows="20" cols="180"><?php echo $board['content']; ?></textarea></td>
					 </tr>
				 </tbody>
				 </table>

				 <div class="bt_se text-center">
						 <input type="submit" value="수정완료" button type="button" class="btn btn-primary"></button>
				 </div>
			 </form>

				 </div>


	<hr>
	</br>


	 </body>
	 </div>
	</html>
