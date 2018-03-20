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

							<?php
							if(!isset($_SESSION['admin_permit'])){
								echo "<div class=\"logincheck\">";
		            echo "<h2>";
								echo "</br><p> 로그인을 해 주세요. </br></br></p>";
								echo "<p><form method=\"post\" action=\"login.php\"></p>";
								echo "<p align=\"center\"></br><input type=\"submit\" value=\"LOGIN\" button type=\"button\" class=\"btn btn-primary\"></button></p>";
								echo "</form>";
								echo "</h2>";
							} else {
								?>

								<div class="writebtn">
								  <?php
								  if($_SESSION['admin_permit']==2){ ?>
										<form method="post" action="notice_write.php">
										<p align="right"><input type="submit" value="글쓰기" button type="button" class="btn btn-primary"></button></p>
									</form>
								<?php }
								  ?>
								</div>


								<div class="noticebox">
									<div id="notice_area">
										<table class="table table-striped table-hover table-bordered">
											<thead class="thead-dark">
												<tr>
													<th width="10">번호</th>
													<th width="500">제목</th>
													<th width="120">글쓴이</th>
													<th width="100">작성일</th>
													<th width="40">조회수</th>
												</tr>
											</thead>
											<?php
								$sql = "SELECT * from notice order by idx desc";
								$result = mysqli_query($conn,$sql);

								while($notice = $result->fetch_array()){
									$title=$notice["title"];
									if(strlen($title)>30){
										$title=str_replace($notice["title"],mb_substr($notice["title"],0,30,"utf-8")."...",$notice["title"]);
									}
							?>

							<tbody>
								<tr>
									<td width="10" style="text-align:center"><?php echo $notice['idx']; ?></td>
									<td width="500"><a href="notice_read.php?idx=<?php echo $notice['idx']; ?>"><?php echo $title;?></a></td>
									<td width="120" style="text-align:right" ><?php echo $notice['name']?></td>
									<td width="100" style="text-align:center"><?php echo $notice['date']?></td>
									<td width="40" style="text-align:center"><?php echo $notice['hit']; ?></td>
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
