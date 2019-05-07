<?php 
session_start();
if($_SESSION["login"] != "true" || $_SESSION["quyen"] != 0){
    header('location: ../../index.php?formdangnhap=true');
}
$ho_ten = (isset($_SESSION['tendangnhap']) == 'true') ? $_SESSION['tendangnhap'] : "";
?>

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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="main_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css" integrity="sha384-QokYePQSOwpBDuhlHOsX0ymF6R/vLk/UQVz3WHa6wygxI5oGTmDTv8wahFOSspdm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css" integrity="sha384-vd1e11sR28tEK9YANUtpIOdjGW14pS87bUBuOIoBILVWLFnS+MCX9T6MMf0VdPGq" crossorigin="anonymous">
	<style type="text/css">
		.bieudo{
			margin: 50px 0;
		}
		.mota{
			width: 350px;
			float: left;
			margin: 50px 30px;
		}
		.loai{
			margin: 17px 5px;
			width: 90px;
			height: 50px;
			float: left;
		}
		.label_loai{
			text-align: left;
			width: 200px;
			margin-top: 30px;
			margin-left: 30px;
			float: left;
		}
		td{
			border: 2px solid pink;
		}
	</style>

	<style type="text/css">
        div.menu_tk{
            font-size: 20px;
            background-color: red;
            width: 100%;
            height: 50px;
            top: 0;
            background: linear-gradient(to left, #9fb8ad, #1fc8db, #2cb5e8);
        }
        div.menu_tk>a{
            float: left;
            list-style: none;
            width: 180px;
            text-align: center;
            height: 50px;
            line-height: 50px;
            background: none;
            border: 0;
            text-decoration: none;
            color: #4e5156;
        }

        div.menu_tk>a:hover{
            box-sizing: border-box;
            background: white;
        }
        div.menu_tk li:hover{
            box-sizing: border-box;
            background: white;
        }
        .btn-xoa{
            border-radius: 10px;
            width: 60px;
            background: #b8c1d1;
        }
        .btn-xoa:hover{
            background: #ffffff;
            cursor: pointer;
        }
        div.tieude{
            border: 3px solid black;
            border-radius: 10px;
            width: 300px;
            height: 70px;
            line-height: 60px;
            text-align: center;
            font-size: 30px;
            margin: 40px auto;
        }
        .wrap{
        	margin: 0 auto;
        	width: 100%;
        	height: auto;
        }
        #table1{
        	margin: 30px auto;
			width: 900px;
			height: 20px;

		}
		#table1 td{
			font-size: 20px;
			text-align: left;
			padding: 5px 10px;
		}
		#table2{
			margin: 30px auto;
			width: 900px;
			height: 20px;
			}
		#table2 td{
			font-size: 20px;
			text-align: left;
			padding: 5px 10px;
		}
		.content-bieudo{
			width: 1020px;
			margin: 0 auto;
		}
    </style>

</head>
<body>
	<script type="text/javascript" src="Chart.min.js"></script>
	<div class="menu_tk">
        <a href="index.php">Quản lí sản phẩm</a>
        <a href="quanlytaikhoan.php">Quản lí tài khoản</a>
        <a href="quanlydonhang.php">Quản lí đơn hàng</a>
        <a href="thongke.php">Thống kê</a>
        <div style="text-align: right;">Xin chào <?php echo $ho_ten; ?> <a style="text-decoration: none; line-height: 45px;" href="dangxuat.php">&emsp;Đăng xuất</a></div>
    </div>
    <div class="tieude">Thống kê</div>
    <div class="wrap">
	    <table id="table1">
	    	<tr>
				<td style="text-align: center;" colspan="2">Thống kê chung</td>
			</tr>
	    	<tr>
	            <td>Tổng số lượng khách hàng</td>
	            <td><?php echo $row_tongkhachhang["TONGSOLUONG"]; ?></td>
	        </tr>
	        <tr>
	            <td>Tổng số lượng sản phẩm</td>
	            <td><?php echo $row_tongsoluong["SL_SANPHAM"]; ?></td>
	        </tr>
	        <tr>
	            <td>Loại sản phẩm bán chạy nhất</td>
	            <td><?php echo $loaibanchay?></td>
	        </tr>
	        <tr>
	            <td>Số lượng bán ra</td>
	            <td><?php echo $sl_loaibanchay;?></td>
	        </tr>
	    </table>

		<table id="table2">
			<tr>
				<td style="text-align: center;" colspan="2">Thống kê số lượng từng loại sản phẩm bán ra</td>
			</tr>
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
					echo "<td>".$array_loai[$vitri+1]."</td></tr>";
				# code...
			}

		?>
		</table>
    </div>

	
	<!-- pie chart canvas element -->
        <div class="content-bieudo">
       	<div style="width: 500px; margin-left: 60px;"><b>Tỉ lệ các loại sản phẩm bán ra: (Đơn vị %)</b></div>
        <canvas class="bieudo" id="countries" width="600" height="400"></canvas>
        <div class="mota">
        	<div style="margin: 0 30px;"><b>Chú thích: </b></div>
        		<?php echo $mota;?>
        	<div style="clear: both;"></div>
        	</div>
        <div style="clear: left;"></div>
	<div style="margin-left: 50px;"><b>Tổng doanh thu : <?php echo str_replace(",",".", number_format($row_doanhthu["TONGTIEN"]))." VNĐ"; ?></b></div>
	</div>
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
	<?php echo $_SESSION["tendangnhap"]; ?>
</body>
</html>