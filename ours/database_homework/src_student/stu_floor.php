<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统学生操作界面</title>
</head>

<body>
<?
	$floor = $_POST['floor'];
?>
<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="2"><img src="../images/stuback.png" width="1100" height="200" alt="stu_back"/></td>
  </tr>
  <tr>
    <td height="110" width="284" bgcolor="#F8B651" style="color: #FFFFFF">&nbsp;</td>
    <td width="811" rowspan="5" bgcolor="#FCE5C2"><p style="text-align: center; font-size: 30px;">
    <?
		include "site.php";
	?>
    </td>
  </tr>
  <tr bgcolor="#FAD294">
    <td height="110" width="284" onClick="window.location.href='stu_info.php'">个人信息</td>
  </tr>
  <tr bgcolor="#F8B651">
    <td height="110" width="284">
   	<?
		echo("第".$floor."层详情");
	?>
    </td>
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