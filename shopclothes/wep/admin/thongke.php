
<?php
$array_mau = array("#FF8C94","#4ACAB4","#F8B195","#A8E6CE","#95A5A6","#B3FFB1","#FFEA88");
include('create_connect_mysql.php');
$conn = create_connect();
// tong so luong san pham 
$sql_tongsoluong = "SELECT COUNT(*) SL_SANPHAM FROM sanpham";
$result_tongsoluong = mysqli_query($conn,$sql_tongsoluong);
$row_tongsoluong = $result_tongsoluong->fetch_assoc();
// end tong so luong san pham


// start loai san pham ban chay nhat
$sql_loaisanpham = "SELECT  lsp.MA_LOAI,lsp.TEN_LOAI ,SUM(ct.SO_LUONG) SL FROM chitietdonhang ct JOIN sanpham sp ON ct.MA_SAN_PHAM = sp.MA JOIN loaisanpham lsp ON sp.MA_LOAI = lsp.MA_LOAI  GROUP BY sp.MA_LOAI ORDER BY `SL` DESC ";
$result_loaisanpham = mysqli_query($conn, $sql_loaisanpham);
$row_loaisanpham = $result_loaisanpham->fetch_assoc();
$loaibanchay = $row_loaisanpham["TEN_LOAI"];
$sl_loaibanchay = $row_loaisanpham["SL"];
$array_phantram = array();
// end loai san pham
		// tinh phan tram
		$array_loai = array();
		array_push($array_loai, $row_loaisanpham["TEN_LOAI"]);
		array_push($array_loai, $row_loaisanpham["SL"]);	
		$tongsoluong = $sl_loaibanchay;
		while ($row_loaisanpham = $result_loaisanpham->fetch_assoc()) {
			array_push($array_loai, $row_loaisanpham["TEN_LOAI"]);
			array_push($array_loai, $row_loaisanpham["SL"]);
			$tongsoluong += $row_loaisanpham["SL"];
		}

		for($i = 0 ; $i < count($array_loai) ; $i += 2){
				$phantram = ($array_loai[$i+1]/$tongsoluong)*100;
				array_push($array_phantram,round($phantram,2));
		}
		// end tinh phan tram
		$mota="";
		
// tong doanh thu
	$sql_doanhthu = "SELECT SUM(TONG_TIEN) TONGTIEN FROM chitietdonhang";
	$result_doanhthu = mysqli_query($conn, $sql_doanhthu);
	$row_doanhthu = $result_doanhthu->fetch_assoc();
// end doanh thu
	// start tong khach hàng
	$sql_tongkhachhang = "SELECT COUNT('ID') TONGSOLUONG FROM khachhang";
	$result_tongkhachhang = mysqli_query($conn,$sql_tongkhachhang);
	$row_tongkhachhang = $result_tongkhachhang->fetch_assoc();
//end tong khach hang
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>

	<title>Thống kê</title>
	<style type="text/css">
		.bieudo{
			margin: 50px 0;
		}
		.mota{
			width: 275px;
			float: left;
			margin: 50px 0;
		}
		.loai{
			margin: 17px 5px;
			width: 90px;
			height: 50px;
			float: left;
		}
		.label_loai{
			text-align: center;
			width: 150px;
			margin-top: 30px;
			float: left;
		}
		td{
			border: 2px solid pink;
		}
	</style>
</head>
<body>
	<script type="text/javascript" src="Chart.min.js"></script>
	<h1>Thống kê</h1>
	<div>Tổng số lượng khách hàng: <?php echo $row_tongkhachhang["TONGSOLUONG"]; ?></div>
	<div class="title">Tổng số lượng sản phẩm: <?php echo $row_tongsoluong["SL_SANPHAM"]; ?></div>
	<div>Loại sản phẩm bán chạy nhất: <?php echo $loaibanchay."<br>Số lượng bán ra: ".$sl_loaibanchay;?></div>
	<div><b>Thống kê số lượng từng loại sản phẩm bán ra :</b></div>
	<table>
		<tr>
			<td>Loại sản phẩm</td>
			<td>Số lượng</td>
		</tr>
	<?php 
		foreach ($array_phantram as $key => $value) {
			$vitri = $key * 2;
			$mota .= '<div class="label_loai">'.$array_loai[$vitri].' : '.$value.' % </div>
        	<div class="loai" style="background-color:'.$array_mau[$key].'"></div>';

				echo "<tr><td>".$array_loai[$vitri]."</td> ";
				echo "<td>".$array_loai[$vitri+1]."</td></tr> ";
			# code...
		}

	?>
	</table>
	<div><b>Tỉ lệ các loại sản phẩm bán ra: (Đơn vị %)</b></div>
	<!-- pie chart canvas element -->
        <canvas class="bieudo" id="countries" width="600" height="400"></canvas>
        <div class="mota">
        	<div>Chú thích: </div>
        		<?php 

        			echo $mota;

        		?>
        	<div style="clear: both;"></div>
        	</div>
        <div style="clear: left;"></div>
	<div>Tổng doanh thu : <?php echo str_replace(",",".", number_format($row_doanhthu["TONGTIEN"]))." VNĐ"; ?></div>
	<script type="text/javascript">
		// pie chart data

	var pieData = [
		<?php  
			$i=0;
			foreach ($array_phantram as $key => $value) {
			$vitri = $key * 2;
			echo "{value : ".$value.",";
			echo "color: \"".$array_mau[$i++]."\" }";
			if($key != (count($array_phantram)-1)){
				echo ",";
			  }
			}  

		?>
		
	];

	// pie chart options
	var pieOptions = {
		segmentShowStroke : false,
		animateScale : true
	}
	
	// get pie chart canvas
	var countries= document.getElementById("countries").getContext("2d");
	
	// draw pie chart
	new Chart(countries).Pie(pieData, pieOptions);

	</script>
</body>
</html>