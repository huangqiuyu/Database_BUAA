<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统学生登陆</title>
</head>

<body>
<?php
	session_start();
	
	if(empty($_POST['stu_id']) or empty($_POST['stu_pwd'])){
		echo"<script>alert('学号或密码不能为空!');history.go(-1);</script>";  
	}
	include "../db_link.php";
	$mysqli = db_link();
	$id_num = 0;
	$result;
	
	$id = $_POST['stu_id'];
	$pwd = $_POST['stu_pwd'];
	
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
	if(((int)$id_num)===0){
		echo"<script>alert('该学号不存在！请重新输入！');history.go(-1);</script>"; 
	}
	
	$cmd = "select stu_id from student where stu_id = '$id' and stu_psw = '$pwd' and stu_psw!='NULL'";
	
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
		$stmt->close();
		
		
	}
	/*
	$result = mysqli_query($db_link,$cmd) or
		die("student表提取错误！登陆失败！<a href='stu_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	*/
	
	if(((int)$id_num)===0){
		
		
		$cmd = "select stu_id from student where stu_id = '$id' and stu_psw is null";
	
		if($stmt = $mysqli->prepare($cmd))
		{
			$stmt->execute();//执行查询
			$stmt->bind_result($result);//绑定结果
			for($id_num=0;$stmt->fetch();$id_num++);
			$stmt->close();	
			
		}
		
		/*
		
		$result = mysqli_query($db_link,$cmd) or
			die("student表提取错误！登陆失败！<a href='stu_login.php')返回</a>");
		$id_num = mysqli_num_rows($result);
		*/
		
		if(((int)$id_num)>0){
			echo"<script>alert('该学生未注册！请注册！');history.go(-1);</script>";
		}
	
	
		else
		{
			echo"<script>alert('密码错误！请重新登陆！');history.go(-1);</script>";
		}
		
		
	}
	
	else
	{
		$_SESSION["stu_id"] = $id;
		$_SESSION["stu_pwd"] = $pwd;
		
		
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='student.php'";
		echo "</script>";
		
	}
	

	
	//printf("id_num%d\n",++$id_num);
	//echo "id_num".$id_num;
	
	
?>
</body>
</html>
