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
	
	$newpho = $_POST['phone'];
	$cmd = "update team set team_pho=$newpho where team_id = '$id'";
				
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		
		$stmt->close();
		echo '成功修改联系方式';
	}
	
?>
<body>
</body>
</html>