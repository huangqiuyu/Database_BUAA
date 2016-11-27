<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统团队界面</title>
</head>

<body>
<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="2"><img src="../images/teamback.png" width="1100" height="200" alt=""/></td>
  </tr>
  <tr>
    <td height="110" width="284" bgcolor="#32B16C" style="color: #FFFFFF">&nbsp;</td>
    <td width="811" rowspan="5" bgcolor="#A4E5C2" align="center">
 	<table border="1", align="center">
        
        <tr><th>预约记录编号</th><th>学号</th><th>座位编号</th><th>开始时间</th><th>持续时长</th></tr>
        <?php
			
			include "../db_link.php";
			$mysqli = db_link();
			
			$sum=0;
	 		session_start();
			$id = $_SESSION['team_id'];
			
			$cmd = "select * from ordroom where team_id = '$id'";
			
			if($stmt = $mysqli->prepare($cmd))
			{
				$stmt->execute();//执行查询
				$stmt->bind_result($con_rec,$team_id,$room_id,$start_time,$duration);//绑定结果
				
				while($stmt->fetch())
				{
					echo "<tr><td>";
					echo $con_rec.'</td><td>';
					echo $team_id.'</td><td>';
					echo $room_id.'</td><td>';
					echo $start_time.'</td><td>';
					echo $duration.'</td><tr>';
					$sum++;
				}
				
				if($sum===0)
				{
					echo "<tr><td>";
					echo '无</td><td>';
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
   <input type="button" name="button" id="button" value="取消未完成预约" onClick="window.location.href='team_del.php'">
 </p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="#FAD294">
    <td width="284" height="110" bgcolor="#72D7A0" onClick="window.location.href='team_info.php'">团队信息</td>
  </tr>
  <tr bgcolor="#FAD294">
    <td width="284" height="110" bgcolor="#72D7A0" onClick="window.location.href='team.php'">预约讨论室</td>
  </tr>
  <tr bgcolor="#F8B651">
    <td width="284" height="110" bgcolor="#32B16C">团队记录</td>
  </tr>
  <tr  bgcolor="#F8B651">
    <td width="284" height="110" bgcolor="#32B16C">&nbsp;</td>
  </tr>
</table>
</body>
</html>