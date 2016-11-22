<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="465" colspan="3" bgcolor="#55565B"><img src="../images/back.png" width="1120" height="465" alt=""/></td>
  </tr>
  <tr>
    <form name="stu_sign" method="post" action="stu_login_fun.php">
    <td width="370" height="285" bgcolor="#FAD294" align="center">
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
    </p>
	</td>
    </form>
    <td width="370" bgcolor="#32B16C"><a href="../src_team/team_login.php"><img src="../images/team.png" alt="team" width="370" height="280" /></a></td>
    <td width="370" bgcolor="#00B7EF"><a href="../src_staff/staff_login.php"><img src="../images/staff.png" width="370" height="285" alt=""/></a></td>
  </tr>
  
</table>

</body>
</html>