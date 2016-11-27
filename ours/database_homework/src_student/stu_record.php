<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="2"><img src="../images/stuback.png" width="1100" height="200" alt="stu_back"/></td>
  </tr>
  <tr>
    <td height="110" width="284" bgcolor="#F8B651" style="color: #FFFFFF">&nbsp;</td>
    <td width="811" rowspan="5" bgcolor="#FCE5C2" align="center">   
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table border="1", align="center">
        
        <th>预约记录编号</th><th>学号</th><th>座位编号</th><th>预约时间</th>
        <?php
			
			include "../db_link.php";
			$mysqli = db_link();
			
			$sum=0;
	 		session_start();
			$id = $_SESSION['stu_id'];
			
			$cmd = "select * from ordseat where stu_id = '$id'";
			
			if($stmt = $mysqli->prepare($cmd))
			{
				$stmt->execute();//执行查询
				$stmt->bind_result($con_rec,$stu_id,$seat_id,$arr_time);//绑定结果
				while($stmt->fetch())
				{
					echo "<tr><td>";
					echo $con_rec.'</td><td>';
					echo $stu_id.'</td><td>';
					echo $seat_id.'</td><td>';
					echo $arr_time.'</td><tr>';
					$sum++;
				}
				
				if($sum===0)
				{
					echo "<tr><td>";
					echo '无</td><td>';
					echo '无</td><td>';
					echo '无</td><td>';
					echo '无</td><tr>';
				}
				
				
				$stmt->close();
				
				
			}
			
        ?>
        </table>
      <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>
   <input type="button" name="button" id="button" value="取消未完成预约" onClick="window.location.href='stu_del.php'">
 </p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="#FAD294">
    <td height="110" width="284" onClick="window.location.href='stu_info.php'">个人信息</td>
  </tr>
  <tr bgcolor="#FAD294">
    <td height="110" width="284" onClick="window.location.href='student.php'">预约座位</td>
  </tr>
  <tr bgcolor="#F8B651">
    <td height="110" width="284">我的预约</td>
  </tr>
  <tr  bgcolor="#F8B651">
    <td height="110"width="284">&nbsp;</td>
  </tr>
</table>




</body>
</html>