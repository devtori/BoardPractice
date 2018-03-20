<?php
session_start();
$conn=mysqli_connect("localhost","root","","project");
if(!$conn){
	die("Connection failed : ".mysqli_connect_error());
}

header('Content-Type: text/html; charset=utf-8');

	$bno = $_GET['idx'];
	$sql1 = "select * from notice where idx='".$bno."'";
	$result1 = mysqli_query($conn,$sql1);
	$notice = mysqli_fetch_array($result1);

/* 조회수 카운트 */
	$sql2 = "select * from notice where idx ='".$bno."'";
	$result2 = mysqli_query($conn, $sql2);
	$hit = mysqli_fetch_array($result2);
	$hit = $hit['hit'] + 1;
	$sql3 = "update notice set hit = '".$hit."' where idx = '".$bno."'";
	$result3 = mysqli_query($conn, $sql3);

	?>


	<html lang="ko">

	 <head>
	  <meta charset="UTF-8">
	  <title>게시판</title>
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
						<h1>공지사항</h1>
						<h4>관리자의 공지사항을 읽을 수 있는 게시판입니다.</h4>
					</div>
					<hr>




	 <div class="notice_readbox">
		 <table class="table table-striped table-bordered">
			 <thead class="thead-dark">
				 <tr><th colspan="4"><?php echo $notice['title'];?></th></tr>
			 </thead>
				 <tbody>
				 <tr>
					 <th width="25">번호</th>
					 <td width="200"><?php echo $notice['idx'];?></th>
					 <th width="25">작성자</th>
					 <td width="200"><?php echo $notice['name'];?></th>
				 </tr>
				 <tr>
					 <th width="25">등록일</th>
					 <td width="200"><?php echo $notice['date'];?></th>
					 <th width="25">조회수</th>
					 <td width="200"><?php echo $notice['hit'];?></th>
				 </tr>
				 <tr>
					 <td colspan="4" height="400"><?php echo nl2br("$notice[content]"); ?></td>
				 </tr>
			 </tbody>
		 </table>
	 </div>

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
	 		<?php
	 		if($_SESSION['admin_permit']==2){ ?>
	 		<div class="col-sm-1">
	 			<form method="post" action="notice_modify.php?idx=<?php echo $notice['idx']; ?>">
	 			 <input type="submit" value="수정" button type="button" class="btn btn-primary"></button>
	 		 </form>
	 	 </div>
	 		<div class="col-sm-1">
	 			<form method="post" action="notice_delete.php?idx=<?php echo $notice['idx']; ?>">
	 				<input type="submit" value="삭제" button type="button" class="btn btn-primary"></button>
	 			</form>
	 	</div>
	 <?php } else {
	 ?>
	 	<div class="col-sm-1"></div>
	 	<div class="col-sm-1"></div>
	 	<?php }
	 	?>
	 		<form method="post" action="notice.php">
	 		 <input type="submit" value="목록으로" button type="button" class="btn btn-primary"></button>
	 	 </form>
	 	</div>
	 </div>




	 </body>

	</html>
