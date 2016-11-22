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
    <td width="810" rowspan="5" bgcolor="#9FE8FF">
		<table border="1" align="center">
		<th>账号</th><th>姓名</th><th>性别</th><th>手机号</th><th>注册日期</th>
		<?PHP
			include "../db_link.php";
				$mysqli = db_link();
				session_start();
				$id = $_SESSION['staff_id'];

			$cmd = "select staff_id,staff_name,staff_sex,staff_pho,staff_dep,staff_exp from staff where staff_id = $id" ;//设置查询指令

			if($stmt = $mysqli->prepare($cmd))
			{
				$stmt->execute();//执行查询
				$stmt->bind_result($staff_id,$staff_name,$staff_sex,$staff_pho,$staff_exp);//绑定结果
			}

			while($stmt->fetch())//将result结果集中查询结果取出一条
			{
			 echo "<tr><td>".$staff_id."</td><td>".$staff_name."</td><td>".$staff_sex."</td><td>".$staff_pho."</td><td>".$staff_exp."</td><tr>";
			}
		?>
   	</table>
  </tr>
  <tr bgcolor="#00B7EF">
    <td width="284" height="110">管理员信息</td>
  </tr>
  <tr bgcolor="#32B16C">
    <td width="284" height="110" bgcolor="#5BD8FF" onClick="window.location.href='staff_staff.php'">查询个人记录</td>
  </tr>
  <tr bgcolor="#72D7A0">
    <td width="284" height="110" bgcolor="#5BD8FF" onClick="window.location.href='staff_staff.php'">查询团队记录</td>
  </tr>
  <tr  bgcolor="#00B7EF">
    <td height="110">&nbsp;</td>
  </tr>
</table>
</body>
</html>
