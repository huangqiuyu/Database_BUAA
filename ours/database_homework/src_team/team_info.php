<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统团队操作界面</title>
</head>

<body>
<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="3"><img src="../images/teamback.png" width="1100" height="200" alt=""/></td>
  </tr>
  <tr>
    <td height="110" width="284" bgcolor="#32B16C" style="color: #FFFFFF">&nbsp;</td>
    <td width="811" colspan="2" rowspan="3" bgcolor="#A4E5C2">
    	<table border="1" align="center">
		<th>团队编号</th><th>团队性质</th><th>团队联系电话</th><th>团队成立日期</th>
		<?PHP
			include "../db_link.php";
				$mysqli = db_link();
				session_start();
				$id = $_SESSION['team_id'];

			$cmd = "select team_id,team_pro,team_pho,team_cre from team where team_id = $id" ;//设置查询指令

			if($stmt = $mysqli->prepare($cmd))
			{
				$stmt->execute();//执行查询
				$stmt->bind_result($team_id,$team_pro,$team_pho,$team_cre);//绑定结果
			}

			while($stmt->fetch())//将result结果集中查询结果取出一条
			{
			 echo "<tr><td>".$team_id."</td><td>".$team_pro."</td><td>".$team_pho."</td><td>".$team_cre."</td><tr>";
			}
			$stmt->close();
		?>
   		</table>
   	  <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#F8B651">
    <td width="284" height="110" bgcolor="#32B16C" align="center" style="font-size: 20px"><strong>团队信息</strong></td>
  </tr>
  <tr bgcolor="#FAD294">
    <td width="284" height="110" bgcolor="#72D7A0" onClick="window.location.href='team.php'" align="center" style="font-size: 20px"><strong>预约讨论室</strong></td>
  </tr>
  <tr bgcolor="#FAD294">
    <td width="284" height="110" bgcolor="#72D7A0" onClick="window.location.href='team_record.php'" align="center" style="font-size: 20px"><strong>团队记录</strong></td>
    <form method="post" action="team_psw.php">
    <td width="404" bgcolor="#A4E5C2"><label for="password">修改密码:</label>
    <input type="password" name="password" id="password">
		<input type="submit" name="submit" id="submit" value="提交"></td></form>
   <form method="post" action="team_pho.php">
    <td width="405" bgcolor="#A4E5C2"><label for="textfield2">修改电话:</label>
      <input type="text" name="phone" id="phone">
      <input type="submit" name="submit2" id="submit2" value="提交"></td>
    </form>
  </tr>
  <tr  bgcolor="#F8B651">
   
    <td width="284" height="110" bgcolor="#32B16C">&nbsp;</td>
    <td width="811" colspan="2" bgcolor="#A4E5C2">&nbsp;</td>
  </tr>
</table>
</body>
</html>