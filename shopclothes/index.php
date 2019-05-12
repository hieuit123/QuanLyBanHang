<?php
        session_start();  
        function is_Empty($string){
            if($string == "") return true;
            return false;
        }        
        $formdangnhap = (isset($_GET['form_dangnhap'])) ? $formdangnhap = $_GET['form_dangnhap'] : null;
        $formdangky = (isset($_GET['form_dangky'])) ? $formdangky = $_GET['form_dangky'] : null;
        $form = (isset($_GET['form'])) ? $form = $_GET['form'] : null;    
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

    <?php 

    include('header.php'); ?>
   <div class="super_container_inner" id="ok3conde">
    <div class="super_overlay"></div>
    <!-- Home -->

    <!-- Products -->
        
       <?php

       if($formdangnhap && $check_login != 'true') include('dangnhap.php');
       else if($formdangky) include('dangky.php');
       else if($form == 'sanpham')  include('loadsanpham.php'); 
       else {
      include('load_trangchu.php');
     } 
       ?>
        
            
    </div>

        <!--page nav-->
                                        <!--  End page nav                  -->
      

    <!-- Boxes -->


    <!-- Features -->

    <!-- Footer -->

    <?php
        
        include('feature.php');
        include('footer.php'); ?>

<script>
  function laySPTimKiem(e){
    var dl_timkiem = document.getElementById("dl_timkiem").value;
    temp = new RegExp("['\"]{1,}$");
    kt_timkiem = temp.test(dl_timkiem);
    if(kt_timkiem == true){
      alert("Dữ liệu tìm kiếm không hợp lệ !");
      return false;
    }
    const search = $('input[name="dl_timkiem"]').val()
    $.get("loadsanpham.php", { dl_timkiem: search }, function(data){
      $("#ok3conde").html(data);
    });
    return false;
  }
  
  function locSPTimKiem(e){
    
    const phanloai = $('#phanloai').val()
    const toithieu = $('input#toithieu').val()
    const toida = $('input#toida').val()
    $.get("loadsanpham.php", { phanloai: phanloai, toithieu : toithieu, toida : toida   }, function(data){
      $("#ok3conde").html(data);
    });
    return false;
  }
</script>
</body>
</html>