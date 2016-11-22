<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图书馆空间预约管理系统</title>
</head>
<?php
	function db_link(){		//link database
		$host = "localhost";
		$user = "root";
		$pwd = "164421733";
		$database = "library";
		$db_link = mysqli_connect($host,$user) or
		die("link fail <a href='index.php'>return</a>");
		mysqli_set_charset($db_link,"utf8");
		if(!mysqli_select_db($db_link,$database))
			echo "<script>alert('链接数据库失败')</script>";
		return $db_link;
	}
?>
<body>
</body>
</html>