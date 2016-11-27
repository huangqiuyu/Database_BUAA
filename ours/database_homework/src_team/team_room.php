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
    <td height="110" width="282" bgcolor="#32B16C" style="color: #FFFFFF">&nbsp;</td>
    <td width="567" rowspan="5" bgcolor="#A4E5C2" align="center">
		<?PHP
			include "../db_link.php";
				$mysqli = db_link();
				$id = $_POST['RadioGroup1'];
				session_start();
				$_SESSION["room_id"] = $id;
				$room_sch;

			$cmd = "select room_sch from room where room_id = $id" ;//设置查询指令

			if($stmt = $mysqli->prepare($cmd))
			{
				$stmt->execute();//执行查询
				$stmt->bind_result($room_sch);//绑定结果
				//echo $room_sch;
				
			}
			while($stmt->fetch()){
				//echo $room_sch;
			}
		$stmt->close();
		if($room_sch==='11111111111111')
			echo"<script>alert('该讨论室预约已满!');history.go(-1);</script>";
		else{
			echo '<form name="myform" enctype="multipart/form-data" action="roomorder.php" method="post">';
			echo '<p>';
			if($room_sch[0]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_0" value="0">08:00-9:00</label><br>';
				}
			if($room_sch[1]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_1" value="1">09:00-10:00</label><br>';
				}
			if($room_sch[2]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_2" value="2">10:00-11:00</label><br>';
				}
			if($room_sch[3]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_3" value="3">11:00-12:00</label><br>';
				}
			if($room_sch[4]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_4" value="4">12:00-13:00</label><br>';
				}
			if($room_sch[5]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_5" value="5">13:00-14:00</label><br>';
				}
			if($room_sch[6]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_6" value="6">14:00-15:00</label><br>';
				}
			if($room_sch[7]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_7" value="7">15:00-16:00</label><br>';
				}
			if($room_sch[8]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_8" value="8">16:00-17:00</label><br>';
				}
			if($room_sch[9]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_9" value="9">17:00-18:00</label><br>';
				}
			if($room_sch[10]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_10" value="10">18:00-19:00</label><br>';
				}
			if($room_sch[11]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_11" value="11">19:00-20:00</label><br>';
				}
			if($room_sch[12]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_12" value="12">20:00-21:00</label><br>';
				}
			if($room_sch[13]==='0'){
					echo '<label><input type="checkbox" name="checkbox[]" id="checkbox1_13" value="13">21:00-22:00</label><br>';
				}
				echo '</p>';
		}
		?>
    <td width="239" rowspan="5" bgcolor="#A4E5C2" align="center"><input type="submit" name="submit" id="submit" value="确认预约">  
	</form>      
  </tr>
  <tr bgcolor="#F8B651">
    <td width="282" height="110" bgcolor="#32B16C" align="center" style="font-size: 20px"><strong>团队信息</strong></td>
  </tr>
  <tr bgcolor="#FAD294">
    <td width="282" height="110" bgcolor="#72D7A0" onClick="window.location.href='team.php'" align="center" style="font-size: 20px"><strong>预约讨论室</strong></td>
  </tr>
  <tr bgcolor="#FAD294">
    <td width="282" height="110" bgcolor="#72D7A0" onClick="window.location.href='team_record.php'" align="center" style="font-size: 20px"><strong>团队记录</strong></td>
  </tr>
  <tr  bgcolor="#F8B651">
    <td width="282" height="110" bgcolor="#32B16C">&nbsp;</td>
  </tr>
</table>
</body>
</html>