<?php

class DBC

{
	public $db;
	public $query;
	public $result;




	public function DBI()
	{
		$this->db = new mysqli("localhost","root","","project");
		$this->db->query('SET NAMES UTF8');
		if(mysqli_connect_errno())
		{
			header("Content-Type: text/html; charset=UTF-8");
			echo "데이터 베이스 연동에 실패했습니다.";
			exit;
		}
	}




	public function DBQ()
	{
		$this->result = $this->db->query($this->query);
	}


	public function DBO()
	{
		$this->result->free;
		$this->db->close();
	}
}

?>


<?php

session_start();
	$db = new mysqli("localhost","root","","post");
	$db->set_charset("utf8");

		function mq($sql){
		global $db;
		return $db->query($sql);
	}
?>
