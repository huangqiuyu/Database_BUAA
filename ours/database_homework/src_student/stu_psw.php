<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<?php
	session_start();
	
	
	include "../db_link.php";
	$mysqli = db_link();
				
	
	$id = $_SESSION['stu_id'];
	$newpsw = $_POST['password'];
	$cmd = "update student set stu_psw=$newpsw where stu_id = '$id'";
				
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		
		$stmt->close();
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('成功修改密码！');";
		echo "window.location.href='stu_info.php'";
		echo "</script>";
	}

	
?>
<body>
</body>
</html>