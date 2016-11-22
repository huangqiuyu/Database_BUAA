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
    <form method="post" action="staff_stu_record.php">
    <td width="810" rowspan="5" bgcolor="#9FE8FF" align="center"><p style="text-align: center; font-size: 20px;">
    <label for="stu_id">输入团体编号:</label>
      <input type="text" name="stu_id" id="stu_id" size="30" height="30">
      </p >
    <input type="submit" name="submit" id="submit"  value="提交" style="text-align: center; font-size: 15px;width: 85px; height: 35px;background-color:#00B7EF"> </td>  </form>         
  </tr>
  <tr bgcolor="#5BD8FF">
    <td width="284" height="110" onClick="window.location.href='staff.php'">管理员信息</td>
  </tr>
  <tr bgcolor="#00B7EF">
    <td width="284" height="110">查询个人记录</td>
  </tr>
  <tr bgcolor="#5BD8FF">
    <td width="284" height="110" onClick="window.location.href='staff_team.php'">查询团队记录</td>
  </tr>
  <tr  bgcolor="#00B7EF">
    <td height="110">&nbsp;</td>
  </tr>
</table>
</body>
</html>
