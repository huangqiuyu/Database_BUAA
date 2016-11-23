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
    
    
    
    <center>
        <table border="1", align="center">
        
        <tr><th>学号</th><th>预约记录编号</th><th>违约记录编号</th><th>进出记录编号</th></tr>
        <?php
			
			if(empty($_POST['stu_id'])){
				echo"<script>alert('学号不能为空!');history.go(-1);</script>";  
			}
			include "../db_link.php";
			$mysqli = db_link();
			
			$sum=0;
			$id = $_POST['stu_id'];
			
			$cmd = "select * from psnstatis where stu_id = '$id'";
			
			if($stmt = $mysqli->prepare($cmd))
			{
				$stmt->execute();//执行查询
				$stmt->bind_result($con_rec,$bre_rec,$inout_rec,$stu_id);//绑定结果
				while($stmt->fetch())
				{
					echo "<tr><td>";
					echo $stu_id.'</td><td>';
					echo $con_rec.'</td><td>';
					echo $bre_rec.'</td><td>';
					echo $inout_rec.'</td></tr>';
					$sum++;
				}
				
				if($sum===0)
				{
					echo "<tr><td>";
					echo '无</td><td>';
					echo '无</td><td>';
					echo '无</td><td>';
					echo '无</td></tr>';
				}
				
				
				$stmt->close();
				
				
			}
			
        ?>
        </table>
        <a href="staff_stu.php">返回</a>
    
      </center>
        
    
    
    
    
    
    
    
    
    
    
    
    
    </p ></td>  
    </form>         
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
