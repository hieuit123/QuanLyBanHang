<?php 
session_start();
if($_SESSION["login"] != "true" || $_SESSION["quyen"] != 0){
    header('location: ../../index.php?formdangnhap=true');
}
$ho_ten = (isset($_SESSION['tendangnhap']) == 'true') ? $_SESSION['tendangnhap'] : "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="main_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css" integrity="sha384-QokYePQSOwpBDuhlHOsX0ymF6R/vLk/UQVz3WHa6wygxI5oGTmDTv8wahFOSspdm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css" integrity="sha384-vd1e11sR28tEK9YANUtpIOdjGW14pS87bUBuOIoBILVWLFnS+MCX9T6MMf0VdPGq" crossorigin="anonymous">
    <style type="text/css">
        div.menu_qltk{
            font-size: 20px;
            width: 100%;
            height: 50px;
            top: 0;
            background: linear-gradient(to left, #9fb8ad, #1fc8db, #2cb5e8);
        }
        div.menu_qltk>a{
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

        div.menu_qltk>a:hover{
            box-sizing: border-box;
            background: white;
        }
        .btn-xoa{
            border-radius: 10px;
            width: 70px;
            height: 40px;
            margin: 5px;
            background: #b8c1d1;
            border: 0;
        }
        td{
            width: 300px;
        }
        .btn-xoa:hover{
            background: #ed5e68;
            cursor: pointer;
        }
        div.tieude{
            border: 3px solid black;
            border-radius: 10px;
            width: 500px;
            height: 70px;
            line-height: 60px;
            text-align: center;
            font-size: 30px;
        }
        a#so-trang, a.active{
            margin: 10px 0;
            width: 40px;
            height: 40px;
            text-align: center;
            align-items: center;
            line-height: 40px;
        }

        a#so-trang:hover{
            background: #6CDC02;
            border-radius: 20px 20px;
            cursor: pointer;
            text-decoration: none;
        }

        a.active:hover{
            background: red;
            border-radius: 20px 20px;  
            cursor: not-allowed; 
        }
        form{
            width: 500px;
            margin-left: 50px;
            margin-bottom: 200px;
        }
        .title-2{
            width: 400px;
            font-size: 24px;
            margin: 0 50px;
        }
    </style>
</head>
<?php 

     $form = (isset($_GET['form'])) ? $form = $_GET['form'] : null;
     include('create_connect_mysql.php');
     $page = (isset($_GET['pg']) == true) ? $_GET['pg'] : 0;
     $conn = create_connect();
     // sắp xếp
     $sapxep_muc = isset( $_GET['muc_sapxep'] ) ? $_GET['muc_sapxep'] : 'MA_LOAI' ;
     $loai = isset( $_GET['loai'] ) ? $_GET['loai'] : 'ASC';
     $link_loai = "";// chèn link vào phần sắp xếp ngược lại
     if($loai == "ASC") {
        $link_loai = "DESC";
     }
     else{
        $link_loai  = "ASC";
     }
     // end sắp xếp
     $sql = "SELECT * FROM loaisanpham ORDER BY ".$sapxep_muc." ".$loai." LIMIT ".$page." , 15";
     $sql_soluong = "SELECT COUNT(*) as SO_LUONG FROM loaisanpham";
     $result_soluong = $conn->query($sql_soluong);
     $row_soluong = $result_soluong->fetch_assoc();
     $so_luong_int = $row_soluong['SO_LUONG'];
     $result = $conn->query($sql);
     if(isset($_GET['ma']) && isset($_GET['ten'])){

        $sql_add = "INSERT INTO `loaisanpham`(`MA_LOAI`, `TEN_LOAI`) VALUES ('".$_GET['ma']."','".$_GET['ten']."')";
        if(mysqli_query($conn,$sql_add)){
            echo '<script>alert("Thêm thành công");</script>';
        }
    }
     ?>
<body>
    <script type="text/javascript">
        function xacnhan(url,phuongthuc){
            if(phuongthuc == "xoa"){
            if(confirm("Xác nhận xóa")){
                window.location  = url;
            }
            }
            else{
                if(confirm("Xác nhận sửa")){
                window.location  = url;
            }
            }

        }
    </script>
    <div class="menu_qltk">
        <a href="index.php">Quản lí sản phẩm</a>
        <a href="quanlyloai.php">Quản lí loại</a>
        <a href="quanlytaikhoan.php">Quản lí tài khoản</a>
        <a href="quanlydonhang.php">Quản lí đơn hàng</a>
        <a href="thongke.php">Thống kê</a>
        <a href="suathongtin.php">Sửa thông tin</a>
        <div style="text-align: right;">Xin chào <?php echo $ho_ten; ?> <a style="text-decoration: none;color: #ddd; line-height: 45px;" href="dangxuat.php">&emsp;Đăng xuất</a></div>
    </div>
    <div class="tieude">Quản lí loại sản phẩm</div>
    <?php

    if($form != "sua"){
    include('load_loaisanpham.php');
    }
    else{
        include('form_sua.php');
    }
    $conn->close(); 
        ?>
</body>
</html> 