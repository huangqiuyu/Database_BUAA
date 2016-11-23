<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统管理员登陆</title>
</head>

<body>
<?php
	
	session_start();
	
	if(empty($_POST['staff_id']) or empty($_POST['staff_pwd'])){
		echo"<script>alert('管理员账号或密码不能为空!');history.go(-1);</script>";  
	}
	include "../db_link.php";
	$mysqli = db_link();
	$id_num = 0;
	$result;
	
	
	$id = $_POST['staff_id'];
	$pwd = $_POST['staff_pwd'];
	
	
	$cmd = "select staff_id from staff where staff_id = '$id'";
	
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
	
		$stmt->close();
		
		
	}
	
	if($id_num===0){
		echo"<script>alert('该管理员账号不存在！请重新输入！');history.go(-1);</script>"; 
	}
	
	
	
	$cmd = "select staff_id from staff where staff_id = '$id' and staff_psw = '$pwd' and staff_psw!='NULL'";
	if($stmt = $mysqli->prepare($cmd))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($result);//绑定结果
		for($id_num=0;$stmt->fetch();$id_num++);
	
		$stmt->close();	
		
	}
	
	if($id_num===0){
			
		$cmd = "select staff_id from staff where staff_id = '$id' and staff_psw is null";
		if($stmt = $mysqli->prepare($cmd))
		{
			$stmt->execute();//执行查询
			$stmt->bind_result($result);//绑定结果
			for($id_num=0;$stmt->fetch();$id_num++);
		
			$stmt->close();
			
			
		}
		
		
		
		if($id_num>0){
			echo"<script>alert('该管理员未注册！请注册！');history.go(-1);</script>";
		}
		
		else
		{
			echo"<script>alert('密码错误！请重新登陆！');history.go(-1);</script>";
		}
		
	}
	
	else
	{
		$_SESSION["staff_id"] = $id;
		$_SESSION["staff_pwd"] = $pwd;
		
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='staff.php'";
		echo "</script>";
	}
	
?>
</body>
</html>