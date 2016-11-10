<?
	//系统初始化，清理会话变量
	session_start();
	if(isset($_SESSION["id"])){
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
<?
	//page_top
	include 'index_fun.php';
	$pa_top = '欢迎使用本系统!&nbsp;&nbsp;&nbsp;&nbsp;';
	pa_top($pa_top_caption,$pa_top);
?>
<div align="center">
	<br />
	<hr>
    <br />
    <form name="网站介绍" action="" method="">
    	<textarea name="提示信息" cols="85" rows="6">
        欢迎访问图书馆空间预约系统，说明如下：
      	1.如果您未注册，请选择身份验证，完成相应验证；
        2.已验证后，填写必要信息，选择登陆；
        3.如果您对信用记录有任何疑问，请选择联系管理员。。
        感谢您对本站的支持！
        </textarea>
   </form>
   <form name="signin" action="index_check.php" method="post">
    证件号：<input type="text" name="id" size="20" />
    登陆密码：<input type="password" name="pwd" szie="20" />
    <br />
    <input type="submit" name="submit" value="登陆" />
    <br />
    <br />
    <a href="register.hetml">身份验证</a>
    </form>
</div>

<div align="center">
    <?
		pa_bottom($pa_bottom_caption,$web_email);
	?>
</div>


</body>
</html>