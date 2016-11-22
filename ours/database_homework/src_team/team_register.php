<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统团队注册</title>
</head>
	
<body>
<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="2"><img src="../images/teamback.png" width="1100" height="200" alt=""/></td>
  </tr>
  <form name="team_sign" method="post" action="team_reg_fun.php">
  <tr align="center">
    <td height="550" >
    <p>
      <label for="textfield" style="font-size: 24px">编&nbsp;&nbsp;号:</label>
      <input type="text" name="team_id" id="textfield" style="height: 24px">
    </p>
    <p>
        <label for="password" style="font-size: 24px">密&nbsp;&nbsp;码:</label>
        <input type="password" name="team_pwd" id="password" style="height: 24px">
    </p>
    <p>
      <input name="register" type="submit" id="submit" formmethod="POST" value="注册" style="width:85px;height:35px;background-color:#00B7EF;font-size: 18px;color: #FFFFFF">
    </p></td>
  </tr>
  </form>
</table>

</body>
</html>