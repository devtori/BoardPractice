<?php

$conn=mysqli_connect("localhost","root","","project");
if(!$conn){
  echo "not connect DB";
}

$id_check = $_POST['user_id'];

$sql = "SELECT * FROM member WHERE id='".$id_check."'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if($id_check == ''){
    ?>
<div>아이디를 입력하세요.</div>
<?php
}else{

    if($count == 0){
    ?>
    <div style="color:green" class="use">
    사용가능한 아이디입니다.
    <input type="hidden" value="1" name="use"/>
    </div>
    <?php
    }else{
    ?>
    <div style="color:red" class="use">
    아이디가 존재합니다.
    <input type="hidden" value="0" name="use"/>
    </div>
    <?php
    }
}
    ?>
