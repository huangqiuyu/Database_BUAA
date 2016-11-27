<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>图书馆空间预约系统学生操作界面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/jquery.seat-charts.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<script src="js/jquery-1.11.0.min.js"></script> 
<script src="js/jquery.seat-charts.min.js"></script> 
<script>
	function check(val)
	{
		var id_num = eval(val);
		if(id_num.length!=1){
			alert("必须选择一个座位");
		}
		else{
			  time = prompt("输入预约时间", ""); //将输入的内容赋给变量time
			 var pattern = /([0|1][0-9]|2[0-3]):([0-5][0-9])/;
			 if(!pattern.test(time)){
				 alert("时间格式为XX：XX");
			 }
			// else{
				var postForm = document.createElement("form");//表单对象
				postForm.method="post" ;
				postForm.action = 'seatorder.php';
				
				var postidInput = document.createElement("input");
				postidInput.setAttribute("name", "post_id");
				postidInput.setAttribute("value", post_id);
				postForm.appendChild(postidInput); 
				
				var timeInput = document.createElement("input");
				timeInput.setAttribute("name", "time");
				timeInput.setAttribute("value", time);
				postForm.appendChild(timeInput); 
				
				document.body.appendChild(postForm);
				postForm.submit();
				document.body.removeChild(postForm);
				 
				 /*
				 var nameid="nameid",valueid=post_id;
				 var nametime="nametime",valuetime=time;
				 document.cookie=nameid+"="+valueid+";";
				 document.cookie=nametime+"="+valuetime+";";
				 */
				 
				// window.location.href="seatorder.php";
			// }
		}
	}

</script>


<?php
	session_start();
	$floor = $_POST['floor'];

	include "../db_link.php";
	$mysqli = db_link();
	$floor2 = $floor + 1;
	$ordernum = "select count(seat_id) from seat where seat_id >= $floor and seat_id < $floor2 and seat_sta = '已预定'";
	$orderseat = "select seat_id from seat where seat_id >= $floor and seat_id < $floor2 and seat_sta = '已预定'";
	$order_id = array();
	$idnum;
	$temp;
	
	if($stmt = $mysqli->prepare($orderseat))
	{
		$stmt->execute();//执行查询
		$stmt->bind_result($temp);//绑定结果	
		while($stmt->fetch()){
		for($i=0;$i<strlen($temp);$i++)
			if($temp[$i]==='_')
				break;
		$temp_id = '';
		for($i=$i+1;$i<strlen($temp);$i++)
			$temp_id = $temp_id.$temp[$i];
			array_push($order_id,$temp_id);
		}
		
	}
	
	$order_mes = json_encode($order_id);
	
?>

<table width="1110" height="750" border="1" align="center">
  <tr>
    <td height="200" colspan="2"><img src="../images/stuback.png" width="1100" height="200" alt="stu_back"/></td>
  </tr>
  <tr>
    <td height="110" width="284" bgcolor="#F8B651" style="color: #FFFFFF">&nbsp;</td>
    
    <td width="811" rowspan="5" bgcolor="#FCE5C2"><p style="text-align: center; font-size: 30px;">
    <div class="wrapper">
  		<div class="container">
    		<div id="seat-map">
      			<div class="front-indicator">管理员处</div>
    		</div>
			<div class="booking-details">
				<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
				<h3>已选中的座位 (<span id="counter">0</span>):</h3>
				<ul id="selected-seats"></ul>
				<script type="text/javascript">
				  var today=new Date();
				  var s=today.getFullYear()+"年"+today.getMonth()+"月"+today.getDate()+"日"+today.getHours()+"时"+today.getMinutes()+"分";
				  document.write("时间："+s);
				</script>
				<p>
                <input type="submit" name="submit" id="submit" value="确认" onclick="check(seat_id)"></p>
                
              
                    <div id="legend"></div>
			</div>
  		</div>
	</div>	
	<script>
			floor = <?php echo $floor; ?>;
			order_mes = <?php echo $order_mes; ?>;
			var seat_id = new Array();
			$(document).ready(function() {
				var $cart = $('#selected-seats'),
					$counter = $('#counter'),
					$seat_id = $('#seat_id'),
					sc = $('#seat-map').seatCharts({
					map: [
						'ee_eee',
						'ee_eee',
						'______',
						'ee_eee',
						'ee_eee',
						'______',
						'ee_eee',
						'ee_eee',
						'______',
						'ee_eee',
						'ee_eee',
						'______',
						'ee_eee',
						'ee_eee',
					],
					naming : {
						top : false,
						left: false,
						getLabel : function (character, row, column) {
							return row + '_' + column;;
						},
					},
					legend : {
						node : $('#legend'),
					    items : [
							[ 'e', 'available',   '未预定'],
							[ 'f', 'unavailable', '已预定']
					    ]					
					},
					click: function () {
						if (this.status() == 'available') {
							$('<li>'+floor+'_'+this.settings.label+'号座位'+'</b> <a href="#" class="cancel-cart-item">[删除]</a></li>')
								.attr('id','cart-item-'+this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);
							$counter.text(sc.find('selected').length+1);
							var temp = floor+'_'+this.settings.label;
							seat_id.push(temp);
							post_id = JSON.stringify(seat_id);
							return 'selected';
						} else if (this.status() == 'selected') {
							//update the counter
							$counter.text(sc.find('selected').length-1);
							//remove the item from our cart
							$('#cart-item-'+this.settings.id).remove();
							temp = floor+'_'+this.settings.id;
							seat_id.remove(temp);
							post_id = JSON.stringify(seat_id);
							//seat has been vacated
							return 'available';
						} else if (this.status() == 'unavailable') {
							//seat has been already booked
							return 'unavailable';
						} else {
							return this.style();
						}
					}
				});

				//this will handle "[cancel]" link clicks
				$('#selected-seats').on('click', '.cancel-cart-item', function () {
					//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
					sc.get($(this).parents('li:first').data('seatId')).click();
				});

				//let's pretend some seats have already been booked
				sc.get(order_mes).status('unavailable');
		
		});	

		Array.prototype.indexOf = function(val) { //prototype 给数组添加属性
            for (var i = 0; i < this.length; i++) { //this是指向数组，this.length指的数组类元素的数量
                if (this[i] == val) return i; //数组中元素等于传入的参数，i是下标，如果存在，就将i返回
            }
            return -1;  
        };
		
        Array.prototype.remove = function(val) {   //prototype 给数组添加属性
            var index = this.indexOf(val);  //调用index()函数获取查找的返回值
            if (index > -1) {
                this.splice(index, 1);  //利用splice()函数删除指定元素，splice() 方法用于插入、删除或替换数组的元素
            }
        };
		
	</script>
    </td>
  </tr>
  <tr bgcolor="#FAD294">
    <td height="110" width="284" onClick="window.location.href='stu_info.php'">个人信息</td>
  </tr>
  <tr bgcolor="#F8B651">
    <td height="110" width="284">
   	<?php
		echo("第".$floor."层详情");
	?>
    </td>
  </tr>
  <tr bgcolor="#FAD294">
    <td height="110" width="284" onClick="window.location.href='stu_record.php'">我的预约</td>
  </tr>
  <tr bgcolor="#F8B651">
    <td height="110"width="284">&nbsp;</td>
  </tr>
</table>
</body>
</html>