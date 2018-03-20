<?php
	session_start();
	$conn=mysqli_connect("localhost","root","","project");
  if(!$conn){
    die("Connection failed : ".mysqli_connect_error());
  }
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
	              <a class="nav-link" href="./index.php">Home</a>
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

	          <form method="post" action="logout.php">
	            <input type="submit" value="LOGOUT" button type="button" class="btn btn-secondary"></button>
	          </form>

	        </div>
	        </div>
	      </nav>


				<div class="indexbox">
			 	 <h1>자유게시판</h1>
			 	 <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
			  </div>
			  <hr>




				<?php
				if(!isset($_SESSION['admin_permit'])){
					echo "<div class=\"logincheck\">";
					echo "<h2>";
					echo "</br><p> 로그인을 해 주세요. </br></br></p>";
					echo "<p><form method=\"post\" action=\"login.php\"></p>";
					echo "<p align=\"center\"></br><input type=\"submit\" value=\"LOGIN\" button type=\"button\" class=\"btn btn-primary\"></button></p>";
					echo "</form>";
					echo "</h2>";
					echo "</div>";
				} else {
					?>
					<div class="writebtn">

					<form method="post" action="board_write.php">
					<p align="right"><input type="submit" value="글쓰기" button type="button" class="btn btn-primary"></button></p>
					</form>
				</div>
					<div class="noticebox">
						<div id="board_area">
							<table class="table table-striped table-hover table-bordered">
								<thead class="thead-dark">
									<tr>
										<th width="10">번호</th>
										<th width="500">제목</th>
										<th width="120">댓글수</th>
										<th width="120">글쓴이</th>
										<th width="100">작성일</th>
										<th width="40">조회수</th>
									</tr>
								</thead>
								<?php
								$sql = "SELECT * from board order by idx desc";
								$result = mysqli_query($conn,$sql);

								while($board = $result->fetch_array()){
									$title=$board["title"];
												if(strlen($title)>30){
													$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
												}
				?>

				<tbody>
					<tr>
						<td width="70"><?php echo $board['idx']; ?></td>
            <td width="500"><a href="board_read.php?idx=<?php echo $board['idx']; ?>"><?php echo $title;?></a></td>
						<td width="30"><?php echo $board['cmt_cnt']?></td>
            <td width="120"><?php echo $board['name']?></td>
            <td width="100"><?php echo $board['date']?></td>
            <td width="100"><?php echo $board['hit']; ?></td>
					</tr>
				</tbody>
				<?php } ?>
				</table>
				</div>
				</div>




<?php
}
?>


 </body>
 </div>
</html>
