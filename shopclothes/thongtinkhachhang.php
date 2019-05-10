<?php
        session_start();         
        $ho_ten = (isset($_SESSION['tendangnhap']) == 'true') ? $_SESSION['tendangnhap'] : "";
        $sdt = (isset($_SESSION['sdt_khachhang']) == 'true') ? $_SESSION['sdt_khachhang'] : "";
        $diachi = (isset($_SESSION['dia_chi']) == 'true') ? $_SESSION['dia_chi'] : "Chưa có";
        function is_Empty($string){
            if($string == "") return true;
            return false;
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>H&B Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <style type="text/css">
        h2 {
            width: 350px;
            color: #333;
            margin: 100px auto;

        }

        .title-muc {
            margin-left: 240px;
            font-size: 21px;
            margin-bottom: 10px;

        }

        .btn-chinhsua {
            font-size: 21px;
            margin-left: 240px;
        }

        .btn-ok {
            width: 34px;
            height: 33.5px;
            padding-top: 6px;
            margin-left: 240px;
        }

    </style>
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
    <script src="js/custom.js"></script>
</head>

<body>
    <script>
        function hienthi_diachi() {
            document.getElementById("content-diachi").innerHTML = '<form method="get" action="xuly_doidiachi.php?">' +
                '<input class="title-muc" name="diachi" type="text" placeholder="Nhập vào địa chỉ mới"/><br>' +
                '<input class="btn-ok" type="submit" value="OK"/>' +
                '</form>';

        }

    </script>
    <?php include('header.php'); ?>
    <div class="super_container_inner">
        <div class="super_overlay"></div>
        <!-- Home -->

        <!-- Products -->

        <h2>Thông tin cá nhân</h2>
        <div class="content-thongtincanhan">
            <div class="title-muc">Tên: <span>
                    <?php echo $ho_ten; ?></span></div>
            <div class="title-muc">Số điện thoại: <span>
                    <?php echo $sdt; ?></span></div>
            <div id="content-diachi">
                <div class="title-muc">Địa chỉ giao hàng: <span>
                        <?php echo $diachi; ?></span></div>
                <button class="btn-chinhsua" onclick="hienthi_diachi();">Chỉnh sửa</button>
            </div>
        </div>
    </div>

    <?php
        
        include('feature.php');
        include('footer.php'); ?>


</body>

</html>
