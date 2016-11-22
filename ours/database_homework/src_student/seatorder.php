<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>预约座位处理</title>
</head>
 
<body>
<?php
	include "../db_link.php";
	$mysqli = db_link();
	
	
	//$id = $_POST["seat_id"];
	$id = '1_1_2';
	//$curartime = $_POST["arr_time"];
	$curartime = date('y-m-d',time());
	
	
	
	//查数据库，不能连续预约好几次
	//查数据库，看是否有违约记录
	//生成违约记录，所以就不用每30s检查一次数据库了
	session_start();
	$stu_id = $_SESSION['stu_id'];
	
	$queryordtime = "select arr_time from ordseat where ordseat.con_rec=(select max(con_rec) from ordseat where ordseat.stu_id='$stu_id')";//找到该学生最近的一次预约记录的到位时间
	
	$queryintime = "select in_time from psninout where in_time=(select max(in_time) from psninout where psninout.stu_id='$stu_id')";//找到该学生最近一次进入图书馆的时间，用来生成违约记录
	
	/*
	$result = mysqli_query($db_link,$queryordtime);
	$arrtime = mysql_result($result,0);
	
	$result = mysqli_query($db_link,$queryintime);
	$intime = mysql_result($result,0);
	*/
	
	
	
	
	if($stmt = $mysqli->prepare($queryordtime))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($arrtime);//绑定结果
		$stmt->close();
		
		
	}
	
	if($stmt = $mysqli->prepare($queryintime))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($intime);//绑定结果
		$stmt->close();

	}
	
	
	
	//转换为时间戳
	$arr;
	$arr = strtotime($arrtime);
	$in;
	$in = strtotime($intime);
	
	$oneminute = 60;
	$result;
	
	if(($in>($arr+30*$oneminute))||$in<$arr)//30min
	{
		//违约
		
		$insertpsnbc = "insert into psnbc values ('0123456789','stu_id','$intime','迟到')";
		
		if($stmt = $mysqli->prepare($insertpsnbc))
		{
			$stmt->execute();//执行查询
			$stmt->close();
			echo"成功insert违约记录".'<br />';
			
		}
		
		
		//mysqli_query($db_link,$insertpsnbc);
		
	}
	
	$oneday = 86400;
	$curtime = date('y-m-d',(time()-7*$oneday));//获取当前时间的前一周，用于违约比较
	
	$querybcnum = "select stu_id from psnbc where psnbc.stu_id='$stu_id' and (psnbc.bre_time)<$curtime";
	//查询该学生最近一周的违约记录有多少条
	
	
	
	if($stmt = $mysqli->prepare($querybcnum))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($bcnum=0;$stmt->fetch();$bcnum++);//计算有多少行
		$stmt->close();

	}
	
	
	//$result = mysqli_query($db_link,$querybcnum);
	//$bcnum = mysqli_num_rows($result);
	
	if($bcnum>=3)
	{
		echo"预约失败，因为最近一周违约记录超过三条";
	}
	
	else
	{
		
		$insertord = "insert into ordseat values ('01234567890123456780','$stu_id','$id','$curartime')";
		
		if($stmt = $mysqli->prepare($insertord))
		{
			$stmt->execute();//执行查询
			$stmt->close();
			echo"成功insert预约记录".'<br />';
			
		}
		
		//mysqli_query($db_link,$insertord);
		
		echo"预约成功".'<br />';
		
	}
	
	
	
	
	echo($id);
	
	
?>
</body>
</html>