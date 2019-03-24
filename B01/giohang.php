<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylegiohang.css">
    <link rel="stylesheet" href="style-header.css">
    <link rel="stylesheet" href="style-footer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="icon" href="logohbshop.png">
    <title>H&B-Shop quần áo</title>
    <script type="text/javascript" src="loadgiohang.js"></script>
    
  
</head>
<?php 

    session_start();
    $kt_xoatatca = (isset($_GET['xoatatca'])) ? $_GET['xoatatca'] : false;
    if($kt_xoatatca) session_destroy();
    class SanPham{
    public $ma;
    public $ten;
    public $gia;
    public $soluong;
    public $anh;
    
    function SanPham($ma,$ten,$gia,$soluong,$anh){
        $this->ma = $ma;
        $this->ten = $ten;
        $this->gia = $gia;
        $this->soluong = $soluong;
        $this->anh = $anh;
    }
}
if(isset($_SESSION['giohang']) == true){
    
    $array_giohang = json_decode($_SESSION['giohang']);
}
else $array_giohang = array();


?>

<body>

    <?php include('header.php'); ?>
<div class="main-content">
    <h3>Giỏ hàng</h3>
    <div class="content" id="content">
    <hr>
        <div class="content-left">
        <div class="content-demuc">
        <div class="demuc" id="demuc-0"><span>Tên sản phẩm</span></div>
        <div class="demuc" id="demuc-1"><span>Giá</span></div>
        <div class="demuc" id="demuc-2"><span>Số lượng</span></div>
        <div style="clear: both"></div>
        </div>
        <!-- Content san pham start -->
        <div id="danhsach-sp">
            <?php 
                $tong_soluong = 0;
                $tong_tien = 0;
                foreach ($array_giohang as $key => $value) {
                    echo '<div class="canhle">
                            <div class="content-sanpham">
                                <img src="'.$value->anh.'" alt="aothun001">
                            <div id="content-title"><p>'.$value->ten.'</p><br>
                                <button id="btn-xoa" onclick="xoa_sanpham()"><i class="far fa-trash-alt"></i></button><button id="btn-yeuthich"><i class="far fa-heart"></i></button>
                            </div>
                                     <span style="clear: both"></span>
                            </div>
                        <div class="content-price"><span class="price">'.str_replace(",",".",number_format($value->gia)).'</span></div>
                            <div class="content-soluong">
                                <button id="btngiam" onclick="tinh(-1)" disabled>-</button><input type="text" id="soluong" value="'.$value->soluong.'"> <button onclick="tinh(1)">+</button>
                                 <div style="clear: both"></div>
                                </div>
                            <div style="clear: both"></div>
                       </div>';
                    # code...
                $tong_tien = $value->gia*$value->soluong + $tong_tien;
                $tong_soluong = $value->soluong + $tong_soluong;
                }
            ?>
            <!-- Content san pham end-->
            </div>
            <div style="float: right;padding: 10px;"><a href="giohang.php?xoatatca=true">Xóa tất cả</a></div>
            </div>

        <div class="content-right">
            <div class="content-thanhtoan">
               
                <div class="title-donhang"><span>Thông tin đơn hàng</span></div>
                <div id="tongsl">Số sản phẩm: <span id="tongslsp"><?php echo $tong_soluong; ?></span></div>
                <div id="tongcong">Tổng cộng: <span id="tongcongtien"><?php echo str_replace(",", ".", number_format($tong_tien)) ?></span></div>
                <div><button class="btn-muahang" onclick="muahang()">Mua hàng</button></div>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>
    
</div>
   <?php include('footer.php'); ?>
    <!-- end footer -->
    </body>
</html>
