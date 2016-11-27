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
	$result;
	if(!empty($_POST["checkbox"])){  
		$array = $_POST["checkbox"]; 
		$temp = $array[0];
		$result = "00000000000000";
		$size = count($array); 
		for($i=0; $i<$size; $i++){  
			if($array[$i]-$temp>1)
				echo"<script>alert('所选时间段必须连续！');window.location.href='team.php';</script>";  
			$temp = $array[$i];
			$result[$array[$i]]='1';
		}  
	}  
	
	$team_id = $_SESSION['team_id'];
	$id = $_SESSION['room_id'];
	
	//计算开始时间和预约时长
	
	for($i=0;$i<14;$i++)
	{
		if($result[$i]==='1')
			break;
	}
	
	$i+=8;
	$start;
	$during;
	
	if($i>9)
	{
		$daytime = date('y-m-d',time());
		$start = '20'.$daytime.' '.$i.':00:00';
	}
	
	else
	{
		$daytime = date('y-m-d',time());
		$start = '20'.$daytime.' 0'.$i.':00:00';
	}
	
	$i-=8;
	for($during=0;$i<14;$i++,$during++)
	{
		if($result[$i]==='0')
			break;
	}
	
	
	
	//查数据库，不能连续预约好几次
	//查数据库，看是否有违约记录
	//生成违约记录，所以就不用每30s检查一次数据库了
	$queryordtime = "select start_time from ordroom where ordroom.con_rec=(select max(con_rec) from ordroom where ordroom.team_id='$team_id')";//找到该学生最近的一次预约记录的到位时间
	
	$queryintime = "select in_time from teaminout where in_time=(select max(in_time) from teaminout where teaminout.team_id='$team_id')";//找到该学生最近一次进入图书馆的时间，用来生成违约记录
	
	
	
	
	
	//转换为时间戳
	$arr;

	$in;

	
	if($stmt = $mysqli->prepare($queryordtime))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($temp);//绑定结果
		$arrtime = '';
		for($bcnum=0;$stmt->fetch()&&$bcnum<1;$bcnum++)
				$arrtime = $temp;//取出字符串
				
		$arr = strtotime($arrtime);
		$stmt->close();
		
		
	}
	
	if($stmt = $mysqli->prepare($queryintime))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($temp);//绑定结果
		$intime = '';
		for($bcnum=0;$stmt->fetch()&&$bcnum<1;$bcnum++)
				$intime = $temp;//取出字符串
		$in = strtotime($intime);
		$stmt->close();

	}
	
	
	
	
	$oneminute = 60;
	$result;
	
	if(($in>($arr+30*$oneminute))||$in<$arr)//30min
	{
		//违约
		
		
		$max = "select max(bre_rec) from teambc";
		if($stmt = $mysqli->prepare($max))
		{
			$stmt->execute();//执行查询
			$stmt->bind_result($result);//绑定结果
			for($bcnum=0;$stmt->fetch()&&$bcnum<1;$bcnum++)
				$max = $result;//取出字符串
			
			$temp=0;
			for($i=2;$i<10;$i++)
			{
				$temp = $temp*10+intval($max[$i]);
				//echo $temp.'<br />';
			}
			
			
			$temp+=1;
			
			for($i=0,$j=$temp;$j>=1;$i++)
				$j/=10;
				
			for($j=8,$max='rb';$j>$i;$j--)
				$max = $max.'0';
			
			$max = $max.$temp;
			
			//echo $max.'<br />';


			
			$stmt->close();
			
			
			$insertpsnbc = "insert into teambc values ('$max','$team_id','$intime','迟到')";
			
			if($stmt = $mysqli->prepare($insertpsnbc))
			{
				$stmt->execute();//执行查询
				$stmt->close();
				//echo"成功insert违约记录".'<br />';
				
			}
			
			
		}
		
		
		//mysqli_query($db_link,$insertpsnbc);
		
	}
	
	
	
	$oneday = 86400;
	$curtime = date('y-m-d',(time()-30*$oneday));//获取当前时间的前两个月，用于违约比较
	
	$querybcnum = "select team_id from teambc where teambc.team_id='$team_id' and (teambc.bre_time)<$curtime";
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
	
	if($bcnum>=2)
	{
		echo"预约失败，因为最近两个月的违约记录超过两条";
	}
	
	else
	{
		$now = time();
		if($now<$arr)
		{
			echo"预约失败，因为你已经有一条预约记录";
		}
		
		else
		{
			$max = "select max(con_rec) from ordroom";
			if($stmt = $mysqli->prepare($max))
			{
				$stmt->execute();//执行查询
				$stmt->bind_result($result);//绑定结果
				for($bcnum=0;$stmt->fetch()&&$bcnum<1;$bcnum++)
					$max = $result;//取出字符串
				
				$temp=0;
				for($i=2;$i<20;$i++)
				{
					$temp = $temp*10+intval($max[$i]);
					//echo $temp.'<br />';
				}
				
				
				$temp+=1;
				
				for($i=0,$j=$temp;$j>=1;$i++)
					$j/=10;
					
				for($j=18,$max='rc';$j>$i;$j--)
					$max = $max.'0';
				
				$max = $max.$temp;
				
				//echo $max.'<br />';
	
	
				
				$stmt->close();
				
				
				$insertord = "insert into ordroom values ('$max','$team_id','$id','$start','$during')";
			
				if($stmt = $mysqli->prepare($insertord))
				{
					$stmt->execute();//执行查询
					$stmt->close();
					//echo"成功insert预约记录".'<br />';
					
				}
				
					
				//mysqli_query($db_link,$insertord);
				
				echo"预约成功".'<br />';
				
			}
			
		
				
		}
		

		
	}
	
	
	
	
	
	
	//echo $result;
	
	//echo $team_id;
?>
</body>
</html>