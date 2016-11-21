<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统学生操作界面</title>
</head>

<body>
<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="3"><img src="../images/stuback.png" width="1100" height="200" alt="stu_back"/></td>
  </tr>
  <tr>
    <td height="110" width="284" bgcolor="#F8B651" style="color: #FFFFFF">&nbsp;</td>
    <form method="post" action="stu_floor.php">
    <td width="569" rowspan="5" bgcolor="#FCE5C2"><p style="text-align: center; font-size: 30px;">
      <label>
        <strong>
        <input type="radio" name="floor" value="5" id="floor_0">
        五层自习室</strong></label>
      </p>
      <p style="text-align: center; font-size: 30px;"><strong><br>
        <label>
          <input type="radio" name="floor" value="4" id="floor_1">
          四层阅览室
        </label>
      </strong></p>
      <p style="text-align: center; font-size: 30px;"><strong><br>
        <label>
          <input type="radio" name="floor" value="3" id="floor_2">
        三层阅览室</label>
      </strong></p>
      <p style="text-align: center; font-size: 30px;"><strong><br>
        <label>
          <input type="radio" name="floor" value="2" id="floor_3">
        二层自习室</label>
      </strong></p>
      <p style="text-align: center; font-size: 30px;"><strong><br>
        <label>
          <input type="radio" name="floor" value="1" id="floor_4">
        一层阅览室</label>
        </strong><br>
    </p></td>
    <td width="235" rowspan="5" bgcolor="#FCE5C2" align="center">
	  <input type="submit" name="login" id="submit" value="查看详情" style="width: 120px; height: 40px;background-color:#F8B651;font-size: 24px;color: #FFFFFF"/>
	  </td>
    </form>
  </tr>
  <tr bgcolor="#FAD294">
    <td height="110" onClick="window.location.href='stu_info.php'">个人信息</td>
  </tr>
  <tr bgcolor="#FAD294">
    <td height="110" bgcolor="#F8B651">预约座位</td>
  </tr>
  <tr bgcolor="#FAD294">
    <td height="110" onClick="window.location.href='stu_record.php'">我的预约</td>
  </tr>
  <tr  bgcolor="#F8B651">
    <td height="110">&nbsp;</td>
  </tr>
</table>
</body>
</html>
