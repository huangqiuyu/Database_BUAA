<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图书馆空间预约管理系统</title>
</head>
<?php
	$pa_top_caption = "图书馆空间预约系统";
	$pa_top_note = "";
	$pa_bottom_caption = "北京航空航天大学";
	$web_email = "katniss_smile@sina.com";
	
	function db_link(){		//link database
		$host = "localhost";
		$user = "root";
		$pwd = "164421733";
		$database = "library";
		$db_link = mysqli_connect($host,$user,$pwd) or
		die("link fail <a href='index.php'>return</a>");
		mysqli_set_charset($db_link,"utf8");
		mysqli_query($db_link,"create database library") or
		die("create fail <a href='index.php'>return</a>");
		if(!mysqli_select_db($db_link,$database))
			print("link database fail");
	}
	//顶部展示
	function pa_top($pa_top_caption,$pa_top_note){
		$pa_top_note.= "北京时间：".date("Y 年 m 月 d 日 H 时 s 分 i 秒");
		print "<table align='center' width='700' border='0'>" ;
		//the first line
		print "<tr><td width='700' height='40'>";
		print "<h1 align='center'><strong>".$pa_top_caption."</strong></h1>";
		print "</marquee></td></tr>";
		//the second line,set marquee(滚动播出效果)
		print "<tr><td bgcolor='#FAFAD2'>"."<marquee direction=left>";	
		print $pa_top_note;
		print '</marquee></td></tr></table>';
	}
	//底部展示
	function pa_bottom($pa_bottom_caption,$web_email){
		print '<hr>';	//create horizontal line
		print '<table align="center" width="700" border="0">';
		print '<tr><td align="center">'.$pa_bottom_caption.'</td></tr>';
		print '<tr><td align="center">'.'<a href="mailto:$web_email">联系管理员</a></td></tr>';	
		//mailto:自动选择本地的默认邮件软件，并将邮件地址放到邮件软件的发送地址中
		print '</table>';
	}
	
	//菜单栏设置
	function pa_menu($menu_display){
		include 'pa_menu.php';
		if($menu_display=1){
			$menu_item = $menu_1;
		}
		else{
			if($menu_display=2){
				$menu_item = $menu_2;
			}
			else{
				$menu_item = $menu_1.$menu_2;
			}
		}
		$item_count = count($menu_item);
		$table_width = $item_count * 5 * 15;
		print '<table align="center" border="0">';
		print '<tr>';
		for($i=0;$i<$item_count;$i++){
			if(file_exists($menu_item[$i][1])){
				print '<td height="6"><h5>';
				print '<a href="$munu_item[$i][1]">'.$menu_item[$i][0].'</a>';
				print '</h5></td>';
			}
		}
		print '</tr>';
		print '</table>';
	}
?>
<body>
</body>
</html>