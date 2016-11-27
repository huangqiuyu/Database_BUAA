<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php

	include "../db_link.php";
	$mysqli = db_link();
	session_start();

	
	$id = $_SESSION['staff_id'];
	$newpsw = $_POST['password'];
	
	$cmd = "update staff set staff_psw=$newpsw where staff_id = '$id'";
				
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		
		$stmt->close();
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('成功修改密码！');";
		echo "window.location.href='staff.php'";
		echo "</script>";
	}

	
?>

</body>
</html>