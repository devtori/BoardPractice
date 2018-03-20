<?php
session_start();
$conn=mysqli_connect("localhost","root","","project");
if(!$conn){
	die("Connection failed : ".mysqli_connect_error());
}

header('Content-Type: text/html; charset=utf-8');

	$bno = $_GET['idx'];
	$_SESSION['b_no'] = $bno;

	$sql1 = "select * from board where idx='".$bno."'";
	$result1 = mysqli_query($conn,$sql1);
	$board = mysqli_fetch_array($result1);

/* 조회수 카운트 */
	$sql2 = "select * from board where idx ='".$bno."'";
	$result2 = mysqli_query($conn, $sql2);
	$hit = mysqli_fetch_array($result2);
	$hit = $hit['hit'] + 1;
	$sql3 = "update board set hit = '".$hit."' where idx = '".$bno."'";
	$result3 = mysqli_query($conn, $sql3);




	?>


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
						<?php

						 if($_SESSION['user_id']==$board['name']){
						 ?>
						<div class="col-sm-1">
							<form method="post" action="board_modify.php?idx=<?php echo $board['idx']; ?>">
							 <input type="submit" value="수정" button type="button" class="btn btn-primary"></button>
						 </form>
					 </div>
						<div class="col-sm-1">
							<form method="post" action="board_delete.php?idx=<?php echo $board['idx']; ?>">
								<input type="submit" value="삭제" button type="button" class="btn btn-primary"></button>
							</form>
					</div>
				 <?php }

					 else if($_SESSION['admin_permit']==2){
					 ?>
					 <div class="col-sm-1"></div>
					 <div class="col-sm-1">
						 <form method="post" action="board_delete.php?idx=<?php echo $board['idx']; ?>">
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



	 <div class="board_readbox">
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
						 <td colspan="4" height="400"><?php echo nl2br("$board[content]"); ?></td>
					 </tr>
				 </tbody>
				 </table>



		 <?php

		 $sql4 = "SELECT * from comment where bid ='".$bno."'  " ;
		 $result4 = mysqli_query($conn,$sql4);

		 ?>
		 <table class="list-table table-striped">
		 	<thead>
		     	<tr>
		          <th width="150">댓쓴이</th>
							 <th width="900">댓글내용</th>
		           <th class="text-right" width="200">작성일</th>
		       </tr>
		     </thead>

		 <?php

			 while($commentlist = $result4->fetch_array()){
 			?>

 	<tbody>
 		<tr>
			<td width="120"><?php echo $commentlist['name']?></td>
			<td width="100"><?php echo $commentlist['content']; ?></td>
			<td class="text-right" width="100"><?php echo $commentlist['wdate']?></td>
     </tr>
 	</tbody>
 	<?php } ?>
</table>
				 </div>


<hr>
</br>
	<div class="comment_write">
			<form action="comment_write_ok.php" method="post">
							<table id="commentWrite">
									<tr>
											<td width="120" height="30"><?php echo $_SESSION['user_id']; ?></td>
											<td height="30">&emsp;&emsp;<textarea rows="5" cols="100" name="content" id="ucontent" ></textarea></td>
											<td> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</td>
											<td>
												<div class="bt_se">
													<input type="submit" value="작성" button type="button" class="btn btn-primary"></button>
											</div>
										</td>

									</tr>
							</table>

			</form>
	</div>







	 </body>
	 </div>
	</html>
