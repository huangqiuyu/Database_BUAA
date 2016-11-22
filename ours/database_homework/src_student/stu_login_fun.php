<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统学生登陆</title>
</head>

<body>
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
		die("student表提取错误！注册失败！<a href='stu_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	if($id_num!=1){
		echo"<script>alert('该学号不存在！请重新输入！');history.go(-1);</script>"; 
	}
	
	$cmd = "select * from student where stu_id = '$id' and stu_psw is null";
	$result = mysqli_query($db_link,$cmd) or
		die("student表提取错误！登陆失败！<a href='stu_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	if($id_num!=0){
		echo"<script>alert('该学生未注册！请注册！');history.go(-1);</script>";
	}
	
	$cmd = "select * from student where stu_id = '$id' and stu_psw = '$pwd'";
	$result = mysqli_query($db_link,$cmd) or
		die("student表提取错误！登陆失败！<a href='stu_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	if($id_num!=1){
		echo"<script>alert('密码错误！请重新登陆！');history.go(-1);</script>";
	}
	
	$_SESSION["stu_id"] = $id;
	$_SESSION["stu_pwd"] = $pwd;
	
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='student.php'";
	echo "</script>";
?>
</body>
</html>
