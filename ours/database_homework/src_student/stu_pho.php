<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<?php


	include "../db_link.php";
	$mysqli = db_link();
	session_start();
	
	
	$id = $_SESSION['stu_id'];
	$newpho = $_POST['phone'];
	$cmd = "update student set stu_pho=$newpho where stu_id = '$id'";
				
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		
		$stmt->close();
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('成功修改联系方式！');";
		echo "window.location.href='stu_info.php'";
		echo "</script>";
	}

	
	
?>
<body>
</body>
</html>