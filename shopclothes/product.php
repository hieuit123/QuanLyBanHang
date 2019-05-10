<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sản phẩm</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/flexslider/flexslider.css">
    <link rel="stylesheet" type="text/css" href="styles/product.css">
    <link rel="stylesheet" type="text/css" href="styles/product_responsive.css">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap-4.1.2/popper.js"></script>
    <script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/progressbar/progressbar.min.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="plugins/flexslider/jquery.flexslider-min.js"></script>
    <script src="js/product.js"></script>
</head>

<body>

    <!-- Menu -->
    <?php 
header('Content-type: text/html; charset=utf-8');
$kt_dachon = (isset($_SESSION['dachon'])) ? $_SESSION['dachon'] : false;
if($kt_dachon == 'true'){
    echo '<script>alert("Đã thêm vào giỏ hàng thành công!");</script>';
    $_SESSION['dachon'] = 'false';
}
include('create_connect_mysql.php');
$ma_sanpham = (isset($_GET['idsanpham'])) ? $_GET['idsanpham'] : null;
$conn = create_connect();
$sql = "SELECT * FROM sanpham,loaisanpham WHERE MA = '".$ma_sanpham."' AND sanpham.MA_LOAI=loaisanpham.MA_LOAI";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
$loai_sanpham = $row['TEN_LOAI'];
$ten_sanpham = $row['TEN_SANPHAM'];
$link_anh = $row['ANH'];
$gia = $row['GIA'];
$gia_cu = $row['GIA_CU'];
$thuonghieu = $row['THUONGHIEU'];
$link_anhchitiet = $row['ANH_CHI_TIET'];
$soluong =  1;
$url = "xuly_chonsanpham.php?idsanpham=".$ma_sanpham;
 class SanPham
{
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

$temp_sanpham = new SanPham($ma_sanpham,$ten_sanpham,$gia,$soluong,$link_anh,$thuonghieu);

$_SESSION['sanpham'] = json_encode($temp_sanpham);
include('header.php');
?>

    <script type="text/javascript">
        function link_themgiohang(url) {
            window.location = url;
        }

    </script>

    <div class="super_container_inner">
        <div class="super_overlay"></div>

        <!-- Home -->

        <div class="home">
            <div class="home_container d-flex flex-column align-items-center justify-content-end">
                <div class="home_content text-center">
                    <div class="home_title">Chi tiết sản phẩm</div>
                    <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                        <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="index.php?muc=ao&pg=0&form=search">Áo</a></li>
                            <li><a href="index.php?muc=quan&pg=0&form=search">Quần</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product -->

        <div class="product">
            <div class="container">
                <div class="row">

                    <!-- Product Image -->
                    <div class="col-lg-6">
                        <div class="product_image_slider_container">
                            <div id="slider" class="flexslider">
                                <ul class="slides">
                                    <li>
                                        <?php echo '<img src="images/'.$link_anh.'" />'; ?>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="col-lg-6 product_col">
                        <div class="product_info">
                            <div class="product_name">
                                <?php echo $ten_sanpham; ?>
                            </div>
                            <div class="product_category">In <a href="#">
                                    <?php echo $loai_sanpham; ?></a></div>
                            <div class="product_price">
                                <?php echo str_replace(",",".",number_format($gia)); ?><span>VNĐ</span></div>
                            <div class="product_size">
                                <div class="product_size_title">Chọn kích thước</div>
                                <ul class="d-flex flex-row align-items-start justify-content-start">
                                    <li>
                                        <input type="radio" id="radio_1" name="product_radio" class="regular_radio radio_1">
                                        <label for="radio_1">XS</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio_2" name="product_radio" class="regular_radio radio_2" checked>
                                        <label for="radio_2">S</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio_3" name="product_radio" class="regular_radio radio_3">
                                        <label for="radio_3">M</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio_4" name="product_radio" class="regular_radio radio_4">
                                        <label for="radio_4">L</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio_5" name="product_radio" class="regular_radio radio_5">
                                        <label for="radio_5">XL</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio_6" name="product_radio" class="regular_radio radio_6">
                                        <label for="radio_6">XXL</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="product_text">
                                <p>Những sản phẩm của chúng tôi được thiết kế rất tỉ mỉ. Chất liệu vải cực thoáng và bền tạo sự thoải mái cho người mặc.</p>
                            </div>
                            <div class="product_buttons">
                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                    <a>
                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center themhang">
                                            <div>
                                                <div><img src="images/heart_2.svg" class="svg" alt="">
                                                    <div>+</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href=<?php echo $url; ?>><div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center themhang">
                                            <div>
                                                <div><img src="images/cart.svg" class="svg" alt="">
                                                    <div>+</div>
                                                </div>
                                            </div>
                                        </div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="width: 350px;margin: 0 auto; font-size: 26px;"><b>Thông tin chi tiết sản phẩm</b></div>
                <div class="row">
                </div>
                <div class="col-xl-12">
                    <?php echo '<img src="images/'.$link_anhchitiet.'">'; ?>
                </div>
            </div>
            <!-- Footer -->
        </div>
    </div>

    <!-- Boxes -->

    <?php
			  include('footer.php');
		 ?>
    </div>

    </div>

</body>

</html>
