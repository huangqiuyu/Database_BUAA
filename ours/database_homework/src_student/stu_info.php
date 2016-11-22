<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统学生操作界面</title>
</head>

<body>

<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="2"><img src="../images/stuback.png" width="1100" height="200" alt="stu_back"/></td>
  </tr>
  <tr>
    <td height="110" width="284" bgcolor="#F8B651" style="color: #FFFFFF">&nbsp;</td>
    <td width="811" rowspan="5" bgcolor="#FCE5C2">
	<table border="1" align="center">
		<th>学号</th><th>姓名</th><th>性别</th><th>手机号</th><th>系号</th><th>注册日期</th>
		<?PHP
			include "../db_link.php";
				$mysqli = db_link();
				session_start();
				$id = $_SESSION['stu_id'];

			$cmd = "select stu_id,stu_name,stu_sex,stu_pho,stu_dep,stu_exp from student where stu_id = $id" ;//设置查询指令

			if($stmt = $mysqli->prepare($cmd))
			{
				$stmt->execute();//执行查询
				$stmt->bind_result($stu_id,$stu_name,$stu_sex,$stu_pho,$stu_dep,$stu_exp);//绑定结果
			}

			while($stmt->fetch())//将result结果集中查询结果取出一条
			{
			 echo "<tr><td>".$stu_id."</td><td>".$stu_name."</td><td>".$stu_sex."</td><td>".$stu_pho."</td><td>".$stu_dep."</td><td>".$stu_exp."</td><tr>";
			}
		?>
   	</table>
    </td>
  </tr>
  <tr bgcolor="#F8B651">
    <td height="110" width="284">个人信息</td>
  </tr>
  <tr bgcolor="#FAD294">
    <td height="110" width="284" onClick="window.location.href='student.php'">预约座位</td>
  </tr>
  <tr bgcolor="#FAD294">
    <td height="110" width="284" onClick="window.location.href='stu_record.php'">我的预约</td>
  </tr>
  <tr  bgcolor="#F8B651">
    <td height="110"width="284">&nbsp;</td>
  </tr>
</table>
</body>
</html>