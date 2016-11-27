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
	
	$id = $_SESSION['team_id'];
	
	$arr;
	
	$cmd = "select start_time from ordroom where ordroom.con_rec=(select max(con_rec) from ordroom where ordroom.team_id='$id')";
	
			
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($temp);//绑定结果
		$arrtime = '';
		for($bcnum=0;$stmt->fetch()&&$bcnum<1;$bcnum++)
				$arrtime = $temp;//取出字符串
		$arr = strtotime($arrtime);
		$stmt->close();
		
	}
	
	$now = time();
	
	if($now<$arr)
	{
		$cmd = "delect from ordroom where ordroom.con_rec in (select * from (select max(con_rec) as col1 from ordroom where ordroom.team_id='$id') as tmp)";
		
		if($stmt = $mysqli->prepare($cmd))
		{
			$stmt->execute();//执行查询
			$stmt->close();
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('成功取消未完成预约！');";
			echo "window.location.href='team_record.php'";
			echo "</script>";
		}
		else
		
		{
			echo '无法删除';	
		}
	}
	
	else
	{
		echo '已经过了预约时的到位时间，所以无法删除';	
	}
	
	
	
	
?>
</body>
</html>