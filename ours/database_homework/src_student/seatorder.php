<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>预约座位处理</title>
</head>
 
<body>
<?php
	$id = $_POST["seat_id"];
	$curartime = $_POST["arr_time"];
	
	global $bre_rec,$con_rec,$inout_rec;/////////
	$bre_rec = '00000000';
	$con_rec = '00000000';
	$inout_rec = '00000000';
	
	
	//查数据库，不能连续预约好几次
	//查数据库，看是否有违约记录
	//生成违约记录，所以就不用每30s检查一次数据库了
	$stu_id = $_POST['stu_id'];
	$queryordtime = "select * from ordseat where ordseat.con_rec=(select max(con_rec) from ordseat where ordseat.stu_id='$stu_id')";//找到该学生最近的一次预约记录的到位时间
	
	$queryintime = "select * from psninout where in_time=(select max(in_time) from psninout where psninout.stu_id='$stu_id')";//找到该学生最近一次进入图书馆的时间，用来生成违约记录
	
	$result = mysqli_query($db_link,$queryordtime);
	$arrtime = mysql_result($result,1,"arr_time");
	
	$result = mysqli_query($db_link,$queryintime);
	$intime = mysql_result($result,1,"in_time");
	
	
	//转换为时间戳
	$arr;
	$arr = strtotime($arrtime);
	$in;
	$in = strtotime($intime);
	
	$oneminute = 60;
	
	
	if(($in>($arr+30*$oneminute))||$in<$arr)//30min
	{
		//违约
		$bre_rec+=1;
		$insertpsnbc = "insert into psnbc values ('sb'.'$bre_rec','stu_id',$intime,'迟到')";
		
		mysqli_query($db_link,$insertpsnbc);
		
	}
	
	$oneday = 86400;
	$curtime = date('y-m-d',(time()-7*$oneday));//获取当前时间的前一周，用于违约比较
	
	$querybcnum = "select * from psnbc where psnbc.stu_id='$stu_id' and (psnbc.bre_time)<$curtime";
	//查询该学生最近一周的违约记录有多少条
	
	$result = mysqli_query($db_link,$querybcnum);
	$bcnum = mysqli_num_rows($result);
	
	if($bcnum>=3)
	{
		echo"预约失败，因为最近一周违约记录超过三条";
	}
	
	else
	{
		$con_rec+=1;
		$insertord = "insert into ordseat values ('sc'.'$con_rec','$stu_id',$id,$curartime)";
		mysqli_query($db_link,$insertord);
		
		echo"预约成功";
		
	}
	
	
	
	
	
	echo($id);
?>
</body>
</html>