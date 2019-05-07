<?php 
session_start();
if($_SESSION["login"] != "true" || $_SESSION["quyen"] != 0){
    header('location: ../../index.php?formdangnhap=true');
}
$ho_ten = (isset($_SESSION['tendangnhap']) == 'true') ? $_SESSION['tendangnhap'] : "";
$ma = (isset($_GET["masanpham"])) ? $_GET["masanpham"] : null;
$_SESSION["ma_sua"] = $ma;
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
        div.menu_qldh{
            font-size: 20px;
            width: 100%;
            height: 50px;
            top: 0;
            background: linear-gradient(to left, #9fb8ad, #1fc8db, #2cb5e8);
        }
        div.menu_qldh>a{
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

        div.menu_qldh>a:hover{
            box-sizing: border-box;
            background: white;
        }
        div.tieude{
            border: 3px solid black;
            border-radius: 10px;
            width: 300px;
            height: 70px;
            line-height: 60px;
            text-align: center;
            font-size: 30px;
        }
        div.tieude{
            border: 3px solid black;
            border-radius: 10px;
            width: 300px;
            height: 70px;
            line-height: 60px;
            text-align: center;
            font-size: 30px;
        }
    </style>
</head>
<?php 
     include('create_connect_mysql.php');
     $conn = create_connect();
     $sql = "SELECT * FROM sanpham WHERE MA = '".$ma."'";
     $result = $conn->query($sql);
     $sanpham = $result->fetch_assoc();
     $conn->close();
     
     ?>
<body>
    <script type="text/javascript">
        function xacnhan(url){

                window.location  = url;

        }
        function setSelected(){
        document.getElementById(<?php echo '"'.$sanpham["MA_LOAI"].'"'; ?>).selected = true;
    }
    </script>
    <div class="menu_qldh">
        <a href="index.php">Quản lí sản phẩm</a>
        <a href="quanlytaikhoan.php">Quản lí tài khoản</a>
        <a href="quanlydonhang.php">Quản lí đơn hàng</a>
        <a href="thongke.php">Thống kê</a>
        <div style="text-align: right;">Xin chào <?php echo $ho_ten; ?> <a style="text-decoration: none; line-height: 45px;" href="dangxuat.php">&emsp;Đăng xuất</a></div>
    </div>
    <div class="tieude">Sửa sản phẩm</div>
    
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 content-sua">
                <form action="xuly_sua.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="txt_form"><span>Tên sản phẩm:</span><br></div>
                        <div class="txt_form"><span>Thương hiệu:</span><br></div>
                        <div class="txt_form"><span>Loại sản phẩm:</span><br></div>
                        <div class="txt_form"><span>Giá:</span><br></div>
                        <div class="txt_form"><span>Số lượng:</span></div>
                        <div class="txt_form"><span>Ảnh:</span><br></div>
                        <div class="txt_form"><span>Ảnh chi tiết:</span></div>
                    </div>
                <div class="col-lg-6">
                    
                    <div class="input_form"><input type="text" name="tensanpham" value=<?php echo '"'.$sanpham["TEN_SANPHAM"].'"'; ?>></div>
                    
                    <div class="input_form"><input type="text" name="thuonghieu" value=<?php echo '"'.$sanpham["THUONGHIEU"].'"'; ?>></div>
                    
                    <select id="phanloai" name="phanloai">
                        <option value="" selected>[Lựa chọn]</option>
                        <option id="ao" value="ao">Áo</option>
                        <option id="quan" value="quan">Quần</option>
                        <option id="non" value="non">Nón</option>
                        <option id="giay" value="giay">Giày</option>
                        <option id="aokhoac" value="aokhoac">Áo khoác</option>
                        <option id="daynit" value="daynit">Dây nịt</option>
                        <option id="dongho" value="dongho">Đồng hồ</option>
                    </select>
                    <?php echo '<script>setSelected();</script>'; ?>

                    <div class="input_form"><input type="text" name="gia" value=<?php echo '"'.$sanpham["GIA"].'"'; ?>></div>
                    
                    <div class="input_form"><input type="text" name="so_luong" value=<?php echo '"'.$sanpham["SO_LUONG"].'"'; ?>></div>

                    <div class="input_form"><input type="file" name="anh"></div>
                    
                    <div class="input_form"><input type="file" name="anh_chitiet"></div>

                    <div class="input_form"><input type="submit" name="sua" value="OK"></div>

                </div>
                </div>
                </form>
            </div>
        </div>

    </div>

</body>
</html> 