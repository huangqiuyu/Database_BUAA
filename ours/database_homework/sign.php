<?
	//系统初始化，清理会话变量
	session_start();
	if(isset($_SESSION["mail"])){
		session_destroy();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图书馆空间预约系统</title>
</head>

<body>
</body>
</html>