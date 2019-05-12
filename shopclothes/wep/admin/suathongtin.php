    <?php 
session_start();
if($_SESSION["login"] != "true" || $_SESSION["quyen"] != 0){
    header('location: ../../index.php?formdangnhap=true');
}
$ho_ten = (isset($_SESSION['tendangnhap']) == 'true') ? $_SESSION['tendangnhap'] : "";
$ma_khach_hang = (isset($_SESSION['ma_khach_hang']) == 'true') ? $_SESSION['ma_khach_hang'] : "";
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
     include('create_connect_mysql.php');
     $conn = create_connect();
     $sql = "SELECT * FROM khachhang WHERE ID=".$ma_khach_hang;
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();
     
     if(isset($_GET["submit"])){
        if( isset($_GET["ten"]) ) {
            $ten = "HO_TEN = '".$_GET["ten"]."',";
        }
        else{
            $ten = "";
        }
        if(isset($_GET['sdt'])){
            $sdt = "SDT = '".$_GET["sdt"]."',";    
        }
        else{
            $sdt = "";
        }
        if(isset($_GET['diachi'])){
            $diachi = "DIA_CHI = '".$_GET["diachi"]."'";
        }
        else{
            $diachi = "";
        }
        $sql_update = "UPDATE khachhang SET ".$ten." ".$sdt." ".$diachi."WHERE ID=".$ma_khach_hang;
        if(mysqli_query($conn,$sql_update)){
            echo '<script>alert("Sửa thành công");</script>';
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
    <div class="tieude">Sửa thông tin khách hàng</div>
        <form action="#" method="get">
            <div>Tên khách hàng</div>
            <input type="text" name="ten" value=<?php echo '"'.$row["HO_TEN"].'"'; ?>> 
            <div>Số điện thoại</div>
            <input type="text" name="sdt" value=<?php echo '"'.$row["SDT"].'"'; ?>> 
            <div>Địa chỉ </div>
            <input type="text" name="diachi" value=<?php echo '"'.$row["DIA_CHI"].'"'; ?>> <br>
            <input type="submit" name="submit" value="OK">

        </form>
    <?php
    $conn->close(); 
        ?>
</body>
</html> 