<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统管理员操作界面</title>
</head>

<body>
<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="3"><img src="../images/staffback.png" width="1100" height="200" alt=""/></td>
  </tr>
  <tr>
    <td height="110" width="284" bgcolor="#00B7EF" style="color: #FFFFFF">&nbsp;</td>
    <form method="post" action="staff_team_record.php">
    <td width="810" rowspan="5" bgcolor="#9FE8FF" align="center"><p style="text-align: center; font-size: 20px;">
    <label for="team_id">输入团体编号：:</label>
      <input type="text" name="team_id" id="team_id" size="30" height="30">
      </p >
      <input type="submit" name="submit" id="submit"  value="提交" style="text-align: center; font-size: 15px;width: 85px; height: 35px;background-color:#00B7EF"> </td> </form>
  </tr>
  <tr bgcolor="#72D7A0">
    <td width="284" height="110" bgcolor="#5BD8FF" onClick="window.location.href='staff.php'">管理员信息</td>
  </tr>
  <tr bgcolor="#32B16C">
    <td width="284" height="110" bgcolor="#5BD8FF" onClick="window.location.href='staff_stu.php'">查询个人记录</td>
  </tr>
  <tr bgcolor="#72D7A0">
    <td width="284" height="110" bgcolor="#00B7EF" >查询团队记录</td>
  </tr>
  <tr  bgcolor="#32B16C">
    <td height="110" bgcolor="#00B7EF">&nbsp;</td>
  </tr>
</table>
</body>
</html>
