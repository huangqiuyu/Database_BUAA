<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆预约空间系统团队注册</title>
</head>
<?php
	if(empty($_POST['team_id']) or empty($_POST['team_pwd'])){
		echo"<script>alert('团队编号或密码不能为空!');history.go(-1);</script>";  
	}
	include "../db_link.php";
	$mysqli = db_link();
	
	$id = $_POST['team_id'];
	$pwd = $_POST['team_pwd'];
	
	$result;
	
	
	$cmd = "select team_id from team where team_id = '$id'";
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
		$stmt->close();
		
		
	}
	
	/*
	$result = mysqli_query($db_link,$cmd) or
		die("team表提取错误！登陆失败！<a href='team_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	*/
	
	if($id_num===0){
		echo"<script>alert('该团队编号不存在！请重新输入！');history.go(-1);</script>"; 
	}
	
	
	$cmd = "select team_id from team where team_id = '$id' and team_psw is not null";
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
		$stmt->close();
		
		
	}
	
	/*
	$result = mysqli_query($db_link,$cmd) or
		die("team表提取错误！登陆失败！<a href='team_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	*/
	if($id_num>0){
		echo"<script>alert('该团队已注册！请直接登陆');window.location.href='team_login.php';</script>";
	}
	
	$cmd = "update team set team_psw = '$pwd' where team_id = '$id'";
	
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行
		$stmt->close();
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='team_login.php'";
		echo "</script>";
		
	}
	
	
	else{
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('注册失败！');";
		echo "window.location.href='team_register.php'";
		echo "</script>";
	}
	
	
	$_SESSION["team_id"] = $id;
	$_SESSION["team_pwd"] = $pwd;
	
	
?>
<body>
</body>
</html>