<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统学生登陆</title>
</head>

<body>
<?
	if(empty($_POST['team_id']) or empty($_POST['team_pwd'])){
		echo"<script>alert('团队编号号或密码不能为空!');history.go(-1);</script>";  
	}
	include "../db_link.php";
	$db_link = db_link();
	$id = $_POST['team_id'];
	$pwd = $_POST['team_pwd'];
	$cmd = "select * from team where team_id = '$id'";
	$result = mysqli_query($db_link,$cmd) or
		die("team表提取错误！注册失败！<a href='team_login.php')返回</a>");
		//return；
	$id_num = mysqli_num_rows($result);
	if($id_num!=1){
		echo"<script>alert('该团队编号不存在！请重新输入！');history.go(-1);</script>"; 
	}
	
	$cmd = "select * from team where team_id = '$id' and team_psw is null";
	$result = mysqli_query($db_link,$cmd) or
		die("team表提取错误！登陆失败！<a href='team_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	if($id_num!=0){
		echo"<script>alert('该团队未注册！请注册！');history.go(-1);</script>";
	}
	
	$cmd = "select * from team where team_id = '$id' and team_psw = '$pwd'";
	$result = mysqli_query($db_link,$cmd) or
		die("team表提取错误！登陆失败！<a href='team_login.php')返回</a>");
	$id_num = mysqli_num_rows($result);
	if($id_num!=1){
		echo"<script>alert('密码错误！请重新登陆！');history.go(-1);</script>";
	}
	
	$_SESSION['team_id'] = $id;
	$_SESSION['team_pwd'] = $pwd;
	
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='team.php'";
	echo "</script>";
?>
</body>
</html>
