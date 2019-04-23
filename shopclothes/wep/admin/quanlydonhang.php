<?php 
session_start();
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
</head>
<?php 
     include('create_connect_mysql.php');
     $page = (isset($_GET['pg']) == true) ? $_GET['pg'] : 0;
     $conn = create_connect();
     $sql = "SELECT dh.MA_DON,dh.MA_KHACH_HANG,dh.THOI_GIAN,dh.TRANG_THAI,SUM(SO_LUONG) TONG_SO_LUONG,SUM(TONG_TIEN) TONG_TIEN FROM donhang dh,chitietdonhang ct WHERE dh.MA_DON=ct.MA_DON GROUP BY dh.MA_DON LIMIT ".$page.",15";
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
    <div>
        <ul>
            <li><a href="index.php">Quản lí sản phẩm</a></li>
            <li><a href="quanlytaikhoan.php">Quản lí tài khoản</a></li>
            <li><a href="quanlydonhang.php">Quản lí đơn hàng</a></li>
            <li><a href="thongke.php">Thống kê</a></li>
        </ul>
    </div>
    <div>Xin chào <?php echo $ho_ten; ?> <a href="dangxuat.php">Thoát</a></div>
    <div class="tieude">Quản lí khách hàng</div>
    <table>
        <tr>
            <th>STT</th>
            <th>Mã đơn</th>
            <th>Mã khách hàng</th>
            <th>Thời gian đặt</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Xử lý</th>
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
                        <td><button onclick="xacnhan(\'xuly_donhang.php?madonhang='.$row['MA_DON'].'\')">Xử lý</button></td>
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
                                                echo '<li class="active"><a>' . ($i+1) . '</a></li>';
                                            }
                                            else{
                                                echo '<li><a href="quanlytaikhoan.php?pg='.$vitri.'">' . ($i+1) . '</a></li>';
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