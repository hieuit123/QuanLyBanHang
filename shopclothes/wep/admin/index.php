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
    <style type="text/css">
        div.menu_admin{
            font-size: 20px;
            width: 100%;
            height: 50px;
            top: 0;
            background: linear-gradient(to left, #9fb8ad, #1fc8db, #2cb5e8);
        }
        div.menu_admin>a{
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

        div.menu_admin>a:hover{
            box-sizing: border-box;
            background: white;
        }
        .btn-xoa, .btn-sua{
            border-radius: 10px;
            width: 70px;
            height: 40px;
            background: #b8c1d1;
            border: 0;
        }
        .btn-xoa:hover{
            background: #ed5e68;
            cursor: pointer;
        }
        .btn-sua:hover{
            background: #2092ec;
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

     $sapxep_muc = isset( $_GET['muc_sapxep'] ) ? $_GET['muc_sapxep'] : 'MA' ;
     $loai = isset( $_GET['loai'] ) ? $_GET['loai'] : 'ASC';
     $link_loai = "";// chèn link vào phần sắp xếp ngược lại
     if($loai == "ASC") {
        $link_loai = "DESC";
     }
     else{
        $link_loai  = "ASC";
     }

     $sql = "SELECT * FROM sanpham ORDER BY ".$sapxep_muc." ".$loai." LIMIT ".$page." , 8 ";
     $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham";
     $result_soluong = $conn->query($sql_soluong);
     $row_soluong = $result_soluong->fetch_assoc();
     $so_luong_int = $row_soluong['SO_LUONG'];
     $result = $conn->query($sql);
     $conn->close();

     ?>
<body>
    <script type="text/javascript">
        function xacnhan(url){

            if(confirm("Xác nhận sửa sản phẩm")){
                window.location  = url;
            }


        }
    </script>
    <div class="menu_admin">
        <a href="index.php">Quản lí sản phẩm</a>
        <a href="quanlytaikhoan.php">Quản lí tài khoản</a>
        <a href="quanlydonhang.php">Quản lí đơn hàng</a>
        <a href="thongke.php">Thống kê</a>
        <div style="text-align: right;">Xin chào <?php echo $ho_ten; ?> !
            <a style="text-decoration: none; line-height: 45px;" href="dangxuat.php">&emsp;Đăng xuất</a>
        </div>
    </div>
    <div class="tieude">Quản lí sản phẩm</div>
    <table>
        <tr>
            <th><a href="#">STT</a></th>
            <th><a href=<?php echo '"index.php?muc_sapxep=MA&loai='.$link_loai.'"'; ?>>Mã sản phẩm <i class="fas fa-sort"></i></a></th>
            <th><a href=<?php echo '"index.php?muc_sapxep=TEN_SANPHAM&loai='.$link_loai.'"'; ?>>Tên sản phẩm <i class="fas fa-sort"></i></a></th>
            <th><a href=<?php echo '"index.php?muc_sapxep=THUONGHIEU&loai='.$link_loai.'"'; ?>>Thương Hiệu <i class="fas fa-sort"></i></a></th>
            <th><a href=<?php echo '"index.php?muc_sapxep=GIA&loai='.$link_loai.'"'; ?>>Giá <i class="fas fa-sort"></i></a></th>
            <th><a href=<?php echo '"index.php?muc_sapxep=SO_LUONG&loai='.$link_loai.'"'; ?>>Số lượng <i class="fas fa-sort"></i></a></th>
            <th><a href="#">Ảnh</a></th>
            <th><a href="#">Xử lý</a></th>
        </tr>
        <?php
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>'.++$i.'</td>
                        <td>'.$row["MA"].'</td>
                        <td>'.$row["TEN_SANPHAM"].'</td>
                        <td>'.$row["THUONGHIEU"].'</td>
                        <td>'.str_replace(",",".",number_format($row["GIA"])).' VNĐ</td>
                        <td>'.$row["SO_LUONG"].'</td>
                        <td><img src="../../images/'.$row["ANH"].'"></td>
                        <td><button class="btn-xoa" onclick="xacnhan(\'xuly_xoa.php?masanpham='.$row['MA'].'\')">Xóa</button><br><br>
                            <button class="btn-sua" onclick="xacnhan(\'sua_sanpham.php?masanpham='.$row['MA'].'\')">Sửa</button>
                        </td>
                    </tr>';
            }
        ?>
    </table>
    <?php
    $sotrang = ceil($so_luong_int/8);
                       echo '</div>
                        <!--page nav-->
                            <div class="row">
                            <div class="col">
                                <div class="page_nav_1">
                                    <ul class="d-flex flex-row align-items-start justify-content-center">';
                                        for($i = 0; $i < $sotrang ; $i++){
                                            $vitri = ($i * 8);
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
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 content-them">
                <div class="tieude">Thêm sản phẩm</div>
                <form action="xuly_them.php" method="post" enctype="multipart/form-data">
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
                    
                    <div class="input_form"><input type="text" name="tensanpham"></div>
                    
                    <div class="input_form"><input type="text" name="thuonghieu"></div>


                    <select id="phanloai" name="phanloai">
                        <option value="" selected>[Lựa chọn]</option>
                        <option value="ao">Áo</option>
                        <option value="quan">Quần</option>
                        <option value="non">Nón</option>
                        <option value="giay">Giày</option>
                        <option value="aokhoac">Áo khoác</option>
                        <option value="daynit">Dây nịt</option>
                        <option value="dongho">Đồng hồ</option>
                    </select>
                    
                    <div class="input_form"><input type="text" name="gia"></div>
                    
                    <div class="input_form"><input type="text" name="so_luong"></div>
                    
                    <div class="input_form"><input type="file" name="anh"></div>
                    
                    <div class="input_form"><input type="file" name="anh_chitiet"></div>

                    <div class="input_form"><input type="submit" name="them" value="OK"></div>
                </div>
                </div>
                </form>
            </div>
        </div>

    </div>

</body>
</html> 