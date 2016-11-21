<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图书馆空间预约系统学生登陆</title>
</head>

<body>
<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="2"><img src="../images/stuback.png" width="1100" height="200" alt=""/></td>
  </tr>
  <tr align="center">
	<td height="160" width="280" bgcolor="#F8B651">
   		<h1><strong><font color="#ffffff">学生登陆</font></strong></h1>
   	</td>
    <td width="793" rowspan="3">&nbsp;
    </td>
  </tr>
  <form name="stu_sign" method="post" action="stu_login_fun.php">
  <tr align="center">
    <td height="270" bgcolor="#FAD294">
     <p>学&nbsp;&nbsp;号：
      <input name="stu_id" type="text" size="20" style="height: 20px"/>
    </p>
      <p>密&nbsp;&nbsp;码：
        <input name="stu_pwd" type="password" size="20" style="height: 20px"/>
      </p>
      <p>
        <input type="submit" name="login" id="submit" value="登陆" style="width: 85px; height: 35px;background-color:#F8B651;font-size: 18px;color: #FFFFFF"/>
      </p>
      <p>
      	<input type="button" name="register" value="注册" style="width: 85px; height: 35px;background-color:#F8B651;font-size: 18px;color: #FFFFFF" onclick="window.location.href='stu_register.php'"/>
      </p></td>
  </tr>
  </form>
  <tr align="center">
    <td height="120" bgcolor="#F8B651" style="color: #FFFFFF; font-size: 18px;">
    <strong><a href="mailto:katniss@buaa.edu.cn">联系我们</a></strong></td>
  </tr>
</table>

</body>
</html>