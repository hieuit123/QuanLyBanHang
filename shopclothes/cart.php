<?php 

    session_start();
    $kt_xoatatca = (isset($_GET['xoatatca'])) ? $_GET['xoatatca'] : false;
    if($kt_xoatatca) $_SESSION['giohang'] = null;
    class SanPham{
    public $ma;
    public $ten;
    public $gia;
    public $soluong;
    public $anh;
    public $thuonghieu;
    
    function SanPham($ma,$ten,$gia,$soluong,$anh,$thuonghieu){
        $this->ma = $ma;
        $this->ten = $ten;
        $this->gia = $gia;
        $this->soluong = $soluong;
        $this->anh = $anh;
        $this->thuonghieu = $thuonghieu;
    }
}
function capnhat_giohang($array_giohang){
	$_SESSION['giohang'] = json_encode($array_giohang);
	$array_giohang = json_decode($_SESSION['giohang']);
	return $array_giohang;

}



if(isset($_SESSION['giohang']) == true){
    
    $array_giohang = json_decode($_SESSION['giohang']);
}
else $array_giohang = array();

if(isset($_GET['func_slcong']) == true){
	$keysanpham = $_GET['func_slcong'];
	++$array_giohang[$keysanpham]->soluong;
	$array_giohang = capnhat_giohang($array_giohang);
}
if(isset($_GET['func_sltru']) == true){
	$keysanpham = $_GET['func_sltru'];
	if($array_giohang[$keysanpham]->soluong > 1){
		--$array_giohang[$keysanpham]->soluong;
		$array_giohang = capnhat_giohang($array_giohang);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Giỏ hàng</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/cart.js"></script>
</head>
<body>

	<?php include('header.php'); ?>
		<div class="super_overlay"></div>

		<!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Giỏ hàng</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="#">Trang chủ</a></li>
							<li>Giỏ hàng của bạn</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Cart -->

		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="cart_container">
							
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
									<li class="mr-auto">Sản phẩm</li>
									<li class="gia">Giá</li>
									<li class="soluong">Số lượng</li>
									<li class="tonggia">Tổng giá</li>
								</ul>
							</div>

							<!-- Cart Items -->
							<div class="cart_items">
								<ul class="cart_items_list">

									<!-- Cart Item -->
				<?php 
                if($array_giohang == null) echo '<div style="width:300px;margin:0 auto;color:#ff7400;"><h4>"Giỏ hàng trống"</h4></div>';
                $tong_soluong = 0;
                $tong_tien = 0;
                $dem=0;
                foreach ($array_giohang as $key => $value) {

                	$tonggia = ($value->gia * $value->soluong);
     
                	++$dem;
                    echo '<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
										<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
											<div><div class="product_number">'.$dem.'</div></div>
											<div><div class="product_image"><img src="images/'.$value->anh.'" alt=""></div></div>
											<div class="product_name_container">
												<div class="product_name"><a href="product.php">'.$value->ten.'</a></div>
												<div class="product_text">'.$value->thuonghieu.'</div>
											</div>
										</div>
										<div class="product_price product_text"><span>Giá:</span>'.str_replace(",",".",number_format($value->gia)).' VNĐ</div>
										<div class="product_quantity_container">
											<div class="product_quantity ml-lg-auto mr-lg-auto text-center">
												<span class="product_text product_num">'.$value->soluong.'</span>
											<a href="cart.php?func_sltru='.$key.'"><div class="qty_sub qty_button trans_200 text-center"><span>-</span></div></a>
												<a href="cart.php?func_slcong='.$key.'"><div class="qty_add qty_button trans_200 text-center"><span>+</span></div></a>
											</div>
										</div>
										<div class="product_total product_text"><span>Tổng giá:</span>'.str_replace(",",".",number_format($tonggia)).' VNĐ</div>
									</li>';
                    # code...
                $tong_tien =  $tong_tien+$tonggia;
                $tong_soluong = $tong_soluong + $value->soluong;
                

                }


            ?>
									

							<!-- Cart Buttons -->
							</ul>
							</div>
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_clear trans_200"><a href="cart.php?xoatatca=true">Xóa tất cả</a></div>
									<div class="button button_continue trans_200"><a href="index.php">Tiếp tục mua hàng</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row cart_extra_row">
				
					<div class="col-lg-12 cart_extra_col">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total">
								<div class="cart_extra_title">Thanh toán</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Số lượng</div>
										<div class="cart_extra_total_value ml-auto"><?php echo $tong_soluong;?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Phí giao hàng</div>
										<div class="cart_extra_total_value ml-auto">Miễn phí</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Tổng tiền</div>
										<div class="cart_extra_total_value ml-auto"><?php echo str_replace(",",".",number_format($tong_tien)); ?> VNĐ</div>
									</li>
								</ul>
								<div class="checkout_button trans_200"><a href="xuly_muahang.php">Mua hàng</a></div>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!-- Footer -->
		
	</div>
		<?php include('footer.php'); ?>
</div>


</body>
</html>