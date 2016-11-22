<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆预约空间系统学生注册</title>
</head>
<?php
	if(empty($_POST['stu_id']) or empty($_POST['stu_pwd'])){
		echo"<script>alert('学号或密码不能为空!');history.go(-1);</script>";  
	}
	include "../db_link.php";
	$mysqli = db_link();
	
	$id = $_POST['stu_id'];
	$pwd = $_POST['stu_pwd'];
	
	$result;
	
	$cmd = "select stu_id from student where stu_id = '$id'";
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
		$stmt->close();
		
		
	}
	
	/*
	$result = mysqli_query($db_link,$cmd) or
		die("student表提取错误！注册失败！<a href='stu_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	*/
	if($id_num===0){
		echo"<script>alert('该学号不存在！请重新输入！');history.go(-1);</script>"; 
	}
	
	$cmd = "select stu_id from student where stu_id = '$id' and stu_psw is not null";
	
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
		$stmt->close();
		
		
	}
	/*
	$result = mysqli_query($db_link,$cmd) or
		die("student表提取错误！注册失败！<a href='stu_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	*/
	
	if($id_num===1){
		echo"<script>alert('该学生已注册！请直接登陆'); window.location.href='stu_login.php';</script>";
	}
	
	$cmd = "update student set stu_psw = '$pwd' where stu_id = '$id'";
	
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行
		$stmt->close();
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('注册成功！');";
		echo "window.location.href='stu_login.php'";
		echo "</script>";
		
	}
	
	
	else{
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('注册失败！');";
		echo "window.location.href='stu_register.php'";
		echo "</script>";
	}
?>
<body>
</body>
</html>