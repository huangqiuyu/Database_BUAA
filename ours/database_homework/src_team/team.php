<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统团队操作界面</title>
</head>

<body>
<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="4"><img src="../images/teamback.png" width="1100" height="200" alt=""/></td>
  </tr>
  <tr>
    <td height="110" width="283" bgcolor="#32B16C" style="color: #FFFFFF">&nbsp;</td>
    <td width="538" rowspan="5" bgcolor="#A4E5C2" align="center">
    <form method="post" action="team_room.php">
     <h1><span style="text-align: center"><strong>
      <label><input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" <?php echo("checked");//设置m默认?>>讨论室1</label>
      <br><br></strong></span></h1>
      <h1><span style="text-align: center"><strong>
      <label><input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">讨论室2</label>
      <br><br></strong></span></h1>
      <h1><span style="text-align: center"><strong>
        <label><input type="radio" name="RadioGroup1" value="3" id="RadioGroup1_2" >讨论室3</label>
      <br></strong></span></h1>
      <p style="text-align: center; font-size: 30px;">
    <td width="267" rowspan="5" bgcolor="#A4E5C2" style="text-align: center; font-size: 36px;"><input type="submit" name="submit" id="submit" value="查看详情">
	</form>
    <span style="text-align: center"></span>    <span style="text-align: center"></span>    <span style="text-align: left"></span>            
  </tr>
  <tr bgcolor="#72D7A0">
    <td width="283" height="110" onClick="window.location.href='team_info.php'" align="center" style="font-size: 20px"><strong>团队信息</strong></td>
  </tr>
  <tr bgcolor="#32B16C">
    <td height="110" width="283" align="center" style="font-size: 20px"><strong>预约讨论室</strong></td>
  </tr>
  <tr bgcolor="#72D7A0">
    <td width="283" height="110" onClick="window.location.href='team_record.php'" align="center" style="font-size: 20px"><strong>团队记录</strong></td>
  </tr>
  <tr  bgcolor="#32B16C">
    <td height="110">&nbsp;</td>
  </tr>
</table>
</body>
</html>
