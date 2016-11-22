<!doctype html>
<html>
<head>
<title>图书馆空间预约系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/jquery.seat-charts.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	session_start();
	global $post_id;
	//$_SESSION['post_id'] = $post_id;
?>
<div class="wrapper">
  <div class="container">
    <div id="seat-map">
      <div class="front-indicator">管理员处</div>
    </div>
    <div class="booking-details">
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
      <h3>已选中的座位 (<span id="counter">0</span>):</h3>
      <ul id="selected-seats"></ul>
      <script type="text/javascript">
		  var today=new Date();
		  var s=today.getFullYear()+"年"+today.getMonth()+"月"+today.getDate()+"日"+today.getHours()+"时"+today.getMinutes()+"分";
		  document.write("时间："+s);
		</script>
      <p><input type="submit" name="submit" id="submit" value="确认"></p> 
      <script>alert(post_id);</script>
      </form>
      <div id="legend"></div>
    </div>
  </div>
</div>
<script src="js/jquery-1.11.0.min.js"></script> 
<script src="js/jquery.seat-charts.min.js"></script> 
<script>
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
							$('<li>'+this.settings.label+'号座位'+'</b> <a href="#" class="cancel-cart-item">[删除]</a></li>')
								.attr('id','cart-item-'+this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);
							$counter.text(sc.find('selected').length+1);
							seat_id.push(this.settings.label);
							post_id = JSON.stringify(seat_id);
							return 'selected';
						} else if (this.status() == 'selected') {
							//update the counter
							$counter.text(sc.find('selected').length-1);
							//and total
							//$total.text(recalculateTotal(sc)-this.data().price);
							//$seat_id.text(recalculateid(sc));
							//remove the item from our cart
							$('#cart-item-'+this.settings.id).remove();
						
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
				sc.get(['1_6', '4_1', '7_1', '7_2']).status('unavailable');
		
		});		
</script>

</body>
</html>
