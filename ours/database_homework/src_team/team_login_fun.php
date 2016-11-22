<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统学生登陆</title>
</head>

<body>
<?php
	
	session_start();
	
	if(empty($_POST['team_id']) or empty($_POST['team_pwd'])){
		echo"<script>alert('团队编号号或密码不能为空!');history.go(-1);</script>";  
	}
	include "../db_link.php";
	$mysqli = db_link();
	$id_num = 0;
	$result;
	
	
	$id = $_POST['team_id'];
	$pwd = $_POST['team_pwd'];
	
	
	$cmd = "select team_id from team where team_id = '$id'";
	
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
	
		$stmt->close();
		
		
	}
	
	if($id_num===0){
		echo"<script>alert('该团队编号不存在！请重新输入！');history.go(-1);</script>"; 
	}
	
	
	
	$cmd = "select team_id from team where team_id = '$id' and team_psw = '$pwd' and team_psw!='NULL'";
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
	
		$stmt->close();
		
		
	}
	
	if($id_num===0){
		
		$cmd = "select team_id from team where team_id = '$id' and team_psw is null";
		if($stmt = $mysqli->prepare($cmd))
		{
			$stmt->execute();//执行查询
			$stmt->bind_result($result);//绑定结果
			for($id_num=0;$stmt->fetch();$id_num++);
		
			$stmt->close();
					
		}
		
		
		if($id_num>0){
			echo"<script>alert('该团队未注册！请注册！');history.go(-1);</script>";
		}
		
		else
		{
			echo"<script>alert('密码错误！请重新登陆！');history.go(-1);</script>";
		}
		
	}
	
	else
	{
		$_SESSION['team_id'] = $id;
		$_SESSION['team_pwd'] = $pwd;
		
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='team.php'";
		echo "</script>";
	}
	
	
?>
</body>
</html>
