<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

<table width="1110" height="750" border="1" align="center">
  <tr bgcolor="#52453A">
    <td height="465" colspan="3" style="color: #F8B651"><img src="../images/back.png" width="1120" height="465" alt=""/></td>
  </tr>
  <tr>
    
    <td width="370" height="285" align="center" bgcolor="#F8B651" style="color: #F8B651">
    <a href="../src_student/stu_login.php"><img src="../images/student.png" alt="student" width="370" height="280" /></a>
	</td>
   <form name="stu_sign" method="post" action="team_login_fun.php">
    <td align="center" width="370" bgcolor="#A4E5C2">
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
      </p>
	  </td>
	  </form>
    <td width="370" bgcolor="#00B7EF"><a href="../src_staff/staff_login.php"><img src="../images/staff.png" width="370" height="285" alt=""/></a></td>
  </tr>
  
</table>

</body>
</html>