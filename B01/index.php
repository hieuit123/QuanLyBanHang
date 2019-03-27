 <?php 
    session_start(); 
    //$kt_login = (isset($_SESSION['thongbao_thatbai'])) ? $_SESSION['thongbao_thatbai'] : true;
    if(isset($_SESSION['thongbao_thatbai'])){
        $kt_login = $_SESSION['thongbao_thatbai'];
    }
    else $kt_login = 'exeption';
    if($kt_login == 'false') {
        echo '<script>alert("Đăng nhập thành công");</script>';
        $_SESSION['thongbao_thatbai'] = 'true';
    }
    $dulieu_timkiem =  (isset($_GET["dl_timkiem"])) ? $_GET["dl_timkiem"] : null;
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="styledangnhap.css">
    <link rel="stylesheet" href="styledangky.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="icon" href="logohbshop.png">
    
    <title>H&B-Shop quần áo</title>
     <script type="text/javascript" src="loadsanpham.js"></script>
    
</head>
<body onload="loadsp()">
    <?php  
        
        function is_Empty($string){
            if($string == "") return true;
            return false;
        }
        $formdangnhap = (isset($_GET['form_dangnhap'])) ? $formdangnhap = $_GET['form_dangnhap'] : null;
        $formdangky = (isset($_GET['form_dangky'])) ? $formdangky = $_GET['form_dangky'] : null;
    
    ?>
    <?php include('header.php'); ?>
    
    <div class="main-content">

        <?php  if((!$formdangnhap && !$formdangky && $dulieu_timkiem == null)) include('banner.php');
         ?>
        <div class="nav-left">
            <img src="image/quangcaor.png" height="1px">

        </div>
       <?php

       if($formdangnhap && $check_login != 'true') include('dangnhap.php');
       else if($formdangky) include('dangky.php');
       else include('loadsanpham.php'); ?>
        
        <div class="nav-right">
            <?php if(!$formdangnhap && !$formdangky) include('locsanpham.php'); ?>
        </div>
        <div style="clear: both"></div>
    </div>
    <?php include('footer.php'); ?>
    
</body>
<!-- <?php  
    if(isset($dulieu_timkiem)) echo "<script type="."text/javascript"."> timkiem('".$dulieu_timkiem."',".$page.");</script>";
      
    ?>     -->
</html>
