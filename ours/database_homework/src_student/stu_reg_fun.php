<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆预约空间系统学生注册</title>
</head>
<?
	if(empty($_POST['stu_id']) or empty($_POST['stu_pwd'])){
		echo"<script>alert('学号或密码不能为空!');history.go(-1);</script>";  
	}
	include "../db_link.php";
	$db_link = db_link();
	$id = $_POST['stu_id'];
	$pwd = $_POST['stu_pwd'];
	$cmd = "select * from student where stu_id = '$id'";
	$result = mysqli_query($db_link,$cmd) or
		die("student表提取错误！登陆失败！<a href='stu_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	if($id_num!=1){
		echo"<script>alert('该学号不存在！请重新输入！');history.go(-1);</script>"; 
	}
	
	$cmd = "select * from student where stu_id = '$id' and stu_psw is not null";
	$result = mysqli_query($db_link,$cmd) or
		die("student表提取错误！登陆失败！<a href='stu_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	if($id_num!=0){
		echo"<script>alert('该学生已注册！请直接登陆'); window.location.href='stu_login.php';</script>";
	}
	
	$_SESSION["stu_id"] = $id;
	$_SESSION["stu_pwd"] = $pwd;
	$cmd = "";
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='stu_login.php'";
	echo "</script>";
?>
<body>
</body>
</html>