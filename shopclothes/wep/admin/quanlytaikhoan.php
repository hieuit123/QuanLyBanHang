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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/solid.css" integrity="sha384-QokYePQSOwpBDuhlHOsX0ymF6R/vLk/UQVz3WHa6wygxI5oGTmDTv8wahFOSspdm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.css" integrity="sha384-vd1e11sR28tEK9YANUtpIOdjGW14pS87bUBuOIoBILVWLFnS+MCX9T6MMf0VdPGq" crossorigin="anonymous">
</head>
<?php 
     include('create_connect_mysql.php');
     $page = (isset($_GET['pg']) == true) ? $_GET['pg'] : 0;
     $conn = create_connect();
     // sắp xếp
     $sapxep_muc = isset( $_GET['muc_sapxep'] ) ? $_GET['muc_sapxep'] : 'ID' ;
     $loai = isset( $_GET['loai'] ) ? $_GET['loai'] : 'ASC';
     $link_loai = "";// chèn link vào phần sắp xếp ngược lại
     if($loai == "ASC") {
        $link_loai = "DESC";
     }
     else{
        $link_loai  = "ASC";
     }
     // end sắp xếp
     $sql = "SELECT * FROM khachhang ORDER BY ".$sapxep_muc." ".$loai." LIMIT ".$page." , 15";
     $sql_soluong = "SELECT COUNT(ID) as SO_LUONG FROM khachhang";
     $result_soluong = $conn->query($sql_soluong);
     $row_soluong = $result_soluong->fetch_assoc();
     $so_luong_int = $row_soluong['SO_LUONG'];
     $result = $conn->query($sql);
     $conn->close();
     ?>
<body>
    <script type="text/javascript">
        function xacnhan(url){

            if(confirm("Xác nhận xóa tài khoản")){
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
        <tr>f
            <th><a href="#">STT</a></th>
            <th><a href=<?php echo '"quanlytaikhoan.php?muc_sapxep=ID&loai='.$link_loai.'"'; ?>>Mã khách hàng <i class="fas fa-sort"></i></a> </th>
            <th><a href=<?php echo '"quanlytaikhoan.php?muc_sapxep=TEN_DANG_NHAP&loai='.$link_loai.'"'; ?>>Tên đăng nhập <i class="fas fa-sort"></i></a></th>
            <th><a href=<?php echo '"quanlytaikhoan.php?muc_sapxep=HO_TEN&loai='.$link_loai.'"'; ?>>Tên khách hàng <i class="fas fa-sort"></i></a></th>
            <th><a href="#">Số điện thoại</a></th>
            <th><a href=<?php echo '"quanlytaikhoan.php?muc_sapxep=TRANG_THAI&loai='.$link_loai.'"'; ?>>Trạng thái <i class="fas fa-sort"></i></a></th>
            <th><a href="#">Xử lí</a></th>
        </tr>
        <?php
            $i = 0;
            while ($row = $result->fetch_assoc()) {

                echo '<tr>
                        <td>'.++$i.'</td>
                        <td>'.$row["ID"].'</td>
                        <td>'.$row["TEN_DANG_NHAP"].'</td>
                        <td>'.$row["HO_TEN"].'</td>
                        <td>'.$row["SDT"].'</td>
                        <td>'.$row["TRANG_THAI"].'</td>
                        <td><button onclick="xacnhan(\'xoa_taikhoan.php?makhachhang='.$row['ID'].'\')">Xóa</button></td>
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