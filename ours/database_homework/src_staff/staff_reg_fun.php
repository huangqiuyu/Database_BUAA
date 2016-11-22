<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统注册界面</title>
</head>

<body>
<?php
	if(empty($_POST['staff_id']) or empty($_POST['staff_pwd'])){
		echo"<script>alert('管理员账号或密码不能为空!');history.go(-1);</script>";  
	}
	include "../db_link.php";
	$mysqli = db_link();
	
	$id = $_POST['staff_id'];
	$pwd = $_POST['staff_pwd'];
	
	$result;
	
	
	$cmd = "select staff_id from staff where staff_id = '$id'";
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
		$stmt->close();
		
		
	}
	
	/*
	$result = mysqli_query($db_link,$cmd) or
		die("staff表提取错误！登陆失败！<a href='staff_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	*/
	
	if($id_num===0){
		echo"<script>alert('该管理员账号不存在！请重新输入！');history.go(-1);</script>"; 
	}
	
	
	$cmd = "select staff_id from staff where staff_id = '$id' and staff_psw is not null";
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
		$stmt->close();
		
		
	}
	
	/*
	$result = mysqli_query($db_link,$cmd) or
		die("staff表提取错误！登陆失败！<a href='staff_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	*/
	if($id_num>0){
		echo"<script>alert('该管理员已注册！请直接登陆');window.location.href='staff_login.php';</script>";
	}
	
	$cmd = "update staff set staff_psw = '$pwd' where staff_id = '$id'";
	
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行
		$stmt->close();
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('注册成功！');";
		echo "window.location.href='staff_login.php'";
		echo "</script>";
		
	}
	
	
	else{
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('注册失败！');";
		echo "window.location.href='staff_register.php'";
		echo "</script>";
	}
	
	
?>
</body>
</html>