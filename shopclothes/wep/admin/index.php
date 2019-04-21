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
    <style type="text/css">
        td{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        table{
            width: 100%;
        }
        td img{
            width: 100px;
        }
        .tieude{
            width: 260px;
            margin: 40px auto;
            font-weight: 800;
            font-size: 30px;
        }
        .txt_form{
            padding: 6.5px;
             border: 1px solid #ddd;
        }
        .input_form{
            padding: 4.5px;
            border: 1px solid #ddd;
        }
        .content-them{
             border: 1px solid black;

        }
        .content-sua{
             border: 1px solid black;
            
        }
        #phanloai{
            padding: 4.5px;
        }
        ul{
            list-style: none;
        }
        li{
            padding: 10px;
        }

    </style>
</head>
<?php 
     include('create_connect_mysql.php');
     $page = (isset($_GET['pg']) == true) ? $_GET['pg'] : 0;
     $conn = create_connect();
     $sql = "SELECT * FROM sanpham  LIMIT ".$page." , 8";
     $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham";
     $result_soluong = $conn->query($sql_soluong);
     $row_soluong = $result_soluong->fetch_assoc();
     $so_luong_int = $row_soluong['SO_LUONG'];
     $result = $conn->query($sql);

     ?>
<body>
    <script type="text/javascript">
        function xacnhan(url){

            if(confirm("Xác nhận xóa sản phẩm")){
                window.location  = url;
            }


        }
    </script>
    <div>
        <ul>
            <li><a href="index.php">Quản lí sản phẩm</a></li>
            <li><a href="quanlitaikhoan.php">Quản lí tài khoản</a></li>
            <li><a href="quanlidonhang.php">Quản lí đơn hàng</a></li>
            <li><a href="thongke.php">Thống kê</a></li>
        </ul>
    </div>
    <div>Xin chào <?php echo $ho_ten; ?> <a href="dangxuat.php">Thoát</a></div>
    <div class="tieude">Quản lí sản phẩm</div>
    <table>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Thương hiệu</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Ảnh</th>
            <th>Xóa</th>
        </tr>
        <?php

            while ($row = $result->fetch_assoc()) {

                echo '<tr>
                        <td>'.$row["MA"].'</td>
                        <td>'.$row["TEN_SANPHAM"].'</td>
                        <td>'.$row["THUONGHIEU"].'</td>
                        <td>'.str_replace(",",".",number_format($row["GIA"])).' VNĐ</td>
                        <td>'.$row["SO_LUONG"].'</td>
                        <td><img src="../../images/'.$row["ANH"].'"></td>
                        <td><button onclick="xacnhan(\'xuly_xoa.php?masanpham='.$row['MA'].'\')">Xóa</button></td>
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
                                            $vitri = ($i * 12);
                                            if($page == $vitri){
                                                echo '<li class="active"><a>' . ($i+1) . '</a></li>';
                                            }
                                            else{
                                                echo '<li><a href="index.php?pg='.$vitri.'">' . ($i+1) . '</a></li>';
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
            <div class="col-lg-6 content-sua">
                <div class="tieude">Sửa sản phẩm</div>
                <form action="xuly_sua.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="txt_form"><span>Nhập vào mã sản phẩm cần sửa:</span></div>
                        <div class="txt_form"><span>Tên sản phẩm:</span><br></div>
                        <div class="txt_form"><span>Thương hiệu:</span><br></div>
                        <div class="txt_form"><span>Loại sản phẩm:</span><br></div>
                        <div class="txt_form"><span>Giá:</span><br></div>
                        <div class="txt_form"><span>Số lượng:</span></div>
                        <div class="txt_form"><span>Ảnh:</span><br></div>
                        <div class="txt_form"><span>Ảnh chi tiết:</span></div>
                    </div>
                <div class="col-lg-6">
                    <div class="input_form"><input  type="text" name="masanpham"></div>
                    
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

                    <div class="input_form"><input type="submit" name="sua" value="OK"></div>

                </div>
                </div>
                </form>
            </div>
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