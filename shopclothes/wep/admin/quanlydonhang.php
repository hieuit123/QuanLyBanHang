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
        .btn-xuly{
            border-radius: 10px;
            width: 70px;
            height: 40px;
            background: #b8c1d1;
            border: 0;
        }
        .btn-xuly:hover{
            background: #41b883;
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
    </style>
</head>
<?php 
     include('create_connect_mysql.php');
     $page = (isset($_GET['pg']) == true) ? $_GET['pg'] : 0;
     $conn = create_connect();

     // sắp xếp
     $sapxep_muc = isset( $_GET['muc_sapxep'] ) ? $_GET['muc_sapxep'] : 'MA_DON' ;
     $loai = isset( $_GET['loai'] ) ? $_GET['loai'] : 'ASC';
     $link_loai = "";// chèn link vào phần sắp xếp ngược lại
     if($loai == "ASC") {
        $link_loai = "DESC";
     }
     else{
        $link_loai  = "ASC";
     }
     // end sắp xếp

     $sql = "SELECT dh.MA_DON,dh.MA_KHACH_HANG,dh.THOI_GIAN,dh.TRANG_THAI,SUM(SO_LUONG) TONG_SO_LUONG,SUM(TONG_TIEN) TONG_TIEN FROM donhang dh,chitietdonhang ct WHERE dh.MA_DON=ct.MA_DON GROUP BY dh.MA_DON ORDER BY ".$sapxep_muc." ".$loai." LIMIT ".$page.",15";
     $sql_soluong = "SELECT COUNT(MA_DON) as SO_LUONG FROM donhang";
     $result_soluong = $conn->query($sql_soluong);
     $row_soluong = $result_soluong->fetch_assoc();
     $so_luong_int = $row_soluong['SO_LUONG'];
     $result = $conn->query($sql);
     $conn->close();
     ?>
<body>
    <script type="text/javascript">
        function xacnhan(url){

            if(confirm("Xác nhận xử lý sản phẩm")){
                window.location  = url;
            }


        }
    </script>
    <div class="menu_qldh">
        <a href="index.php">Quản lí sản phẩm</a>
        <a href="quanlyloai.php">Quản lí loại</a>
        <a href="quanlytaikhoan.php">Quản lí tài khoản</a>
        <a href="quanlydonhang.php">Quản lí đơn hàng</a>
        <a href="thongke.php">Thống kê</a>
        <a href="suathongtin.php">Sửa thông tin</a>
        <div style="text-align: right;">Xin chào <?php echo $ho_ten; ?> <a style="text-decoration: none; line-height: 45px;" href="dangxuat.php">&emsp;Đăng xuất</a></div>
    </div>
    <div class="tieude">Quản lí đơn hàng</div>
    <table>
        <tr>
            <th><a href=#>STT</a></th>
            <th><a href=<?php echo '"quanlydonhang.php?muc_sapxep=MA_DON&loai='.$link_loai.'"'; ?>>Mã đơn <i class="fas fa-sort"></i></a></th>
            <th><a href=<?php echo '"quanlydonhang.php?muc_sapxep=MA_KHACH_HANG&loai='.$link_loai.'"'; ?>>Mã khách hàng <i class="fas fa-sort"></i></a></th>
            <th><a href=<?php echo '"quanlydonhang.php?muc_sapxep=THOI_GIAN&loai='.$link_loai.'"'; ?>>Thời gian đặt <i class="fas fa-sort"></i></a></th>
            <th><a href=<?php echo '"quanlydonhang.php?muc_sapxep=TONG_SO_LUONG&loai='.$link_loai.'"'; ?>>Số lượng <i class="fas fa-sort"></i></a></th>
            <th><a href=<?php echo '"quanlydonhang.php?muc_sapxep=TONG_TIEN&loai='.$link_loai.'"'; ?>>Tổng tiền <i class="fas fa-sort"></i></a></th>
            <th><a href=<?php echo '"quanlydonhang.php?muc_sapxep=TRANG_THAI&loai='.$link_loai.'"'; ?>>Trạng thái <i class="fas fa-sort"></i></a></th>
            <th><a href=#>Xử lý</a></th>
        </tr>
        <?php
            $i = 0;
            while ($row = $result->fetch_assoc()) {

                echo '<tr>
                        <td>'.++$i.'</td>
                        <td>'.$row["MA_DON"].'</td>
                        <td>'.$row["MA_KHACH_HANG"].'</td>
                        <td>'.$row["THOI_GIAN"].'</td>
                        <td>'.$row["TONG_SO_LUONG"].'</td>
                        <td>'.str_replace(",",".",number_format($row['TONG_TIEN'])).'</td>
                        <td>'.$row["TRANG_THAI"].'
                        <td><button class="btn-xuly" onclick="xacnhan(\'xuly_donhang.php?madonhang='.$row['MA_DON'].'\')">Xử lý</button></td>
                    </tr>';
            }

        ?>
    </table>
    <?php
    $sotrang = ceil($so_luong_int/15);
                       echo '</div>
                        <!--page nav-->
                            <div class="row">
                            <div class="col">
                                <div class="page_nav_1">
                                    <ul class="d-flex flex-row align-items-start justify-content-center">';
                                        for($i = 0; $i < $sotrang ; $i++){
                                            $vitri = ($i * 15);
                                            if($page == $vitri){
                                                echo '<a class="active">'.($i+1).'</a>';
                                            }
                                            else{
                                                echo '<a id="so-trang" href="index.php?pg='.$vitri.'">'.($i+1). '</a></li>';
                                            }
                                        }   
                                    echo '</ul>
                                </div>
                            </div>
                        </div>
                            <!--  End page nav -->
                         </div>
                    </div>';
                    ?>

</body>
</html> 