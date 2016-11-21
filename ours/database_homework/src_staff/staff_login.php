<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图书馆空间预约系统管理员登陆</title>
</head>

<body>
<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200"><img src="../images/staffback.png" width="1100" height="200" alt=""/></td>
  </tr>
  <tr align="center">
    <td height="550" >
    <p>
      <label for="textfield" style="font-size: 24px">账&nbsp;&nbsp;号:</label>
      <input type="text" name="stu_id" id="textfield" style="height: 24px">
    </p>
    <p>
        <label for="password" style="font-size: 24px">密&nbsp;&nbsp;码:</label>
        <input type="password" name="stu_pwd" id="password" style="height: 24px">
    </p>
    <p>
      <input name="login" type="submit" id="submit" formmethod="POST" value="登陆" style="width: 85px; height: 35px;background-color:#00B7EF;font-size: 18px;color: #FFFFFF">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input name="register" type="button" value="注册" style="width:85px;height:35px;background-color:#00B7EF;font-size:18px;color: #FFFFFF" onclick="window.location.href='staff_register.php'" />
    </p></td>
  </tr>
</table>
</body>
</html>