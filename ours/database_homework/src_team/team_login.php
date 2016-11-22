<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图书馆空间预约系统团体登陆</title>
</head>

<body>
<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="2"><img src="../images/teamback.png" width="1100" height="200" alt=""/></td>
  </tr>
  <tr align="center">
	<td height="160" width="280" bgcolor="#32B16C">
   		<h1><strong><font color="#ffffff">团体登陆</font></strong></h1>
   	</td>
    <td width="793" rowspan="3">&nbsp;</td>
  </tr>
  <form name="team_sign" method="post" action="team_login_fun.php">
  <tr align="center">
    <td height="270" bgcolor="#94E0B6">
     <p>编&nbsp;&nbsp;号：
      <input name="team_id" type="text" size="20" style="height: 20px"/>
    </p>
      <p>密&nbsp;&nbsp;码：
        <input name="team_pwd" type="password" size="20" style="height: 20px"/>
      </p>
      <p>
        <input type="submit" name="login" id="submit" value="登陆" style="width: 85px; height: 35px;background-color:#32B16C;font-size: 18px;color: #FFFFFF"/>
      </p>
      <p>
      	<input type="button" name="register" value="注册" style="width: 85px; height: 35px;background-color:#32B16C;font-size: 18px;color: #FFFFFF" onclick="window.location.href='team_register.php'"/>
      </p></td>
  </tr>
  </form>
  <tr align="center" bgcolor="#32B16C">
    <td height="120">&nbsp;</td>
  </tr>
</table>
</html>