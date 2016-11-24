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
	
	$id = $_SESSION['team_id'];
	
	
	$newpsw = $_POST['password'];
	$cmd = "update team set team_psw=$newpsw where team_id = '$id'";
				
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		
		$stmt->close();
		echo '成功修改密码';
	}
	
?>
<body>
</body>
</html>