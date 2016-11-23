<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
	session_start();
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
	echo $team_id;
?>
</body>
</html>