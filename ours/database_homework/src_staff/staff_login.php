<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统</title>
</head>

<body>

<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="465" colspan="3" bgcolor="#55565B"><img src="../images/back.png" width="1120" height="465" alt=""/></td>
  </tr>
  <tr>   
    <td width="370" height="285" bgcolor="#F8B651" align="center">
    <a href="../src_student/stu_login.php"><img src="../images/student.png" alt="student" width="370" height="280" /></a>
	</td>
    <td width="370" bgcolor="#32B16C"><a href="../src_team/team_login.php"><img src="../images/team.png" alt="team" width="370" height="280" /></a></td>
    <form name="stu_sign" method="post" action="staff.php">
    <td align="center" width="370" bgcolor="#85E2FF">
	<p>账&nbsp;&nbsp;号：
      <input name="staff_id" type="text" size="20" style="height: 20px"/>
    </p>
    <p>密&nbsp;&nbsp;码：
       <input name="staff_pwd" type="password" size="20" style="height: 20px"/>
    </p>
    <p>
      <input name="login" type="submit" id="submit" formmethod="POST" value="登陆" style="width: 85px; height: 35px;background-color:#00B7EF;font-size: 18px;color: #FFFFFF"></p>
    <p>
      <input name="register" type="button" value="注册" style="width:85px;height:35px;background-color:#00B7EF;font-size:18px;color: #FFFFFF" onclick="window.location.href='staff_register.php'" />
    </p>
	</td>
	</form>
  </tr>
  
</table>

</body>
</html>