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
		$pwd = "";
		$database = "library";
		
		
		$mysqli=new mysqli($host,$user,$pwd,$database);
		//设置mysqli编码
		mysqli_query($mysqli,"SET NAMES utf8");
		//检查连接是否被创建
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} 
		
		return $mysqli;
		
	}
?>
<body>
</body>
</html>