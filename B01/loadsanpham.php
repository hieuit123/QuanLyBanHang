 <div class="nav-content">
           <div class="chimuc" >
        <a>Trang chủ/</a><a>Sản phẩm hot</a>
    </div>
           
            
            <hr class="gachngang">
            <div class="row1" id="content-main">
            <?php 
                include('create_connect_mysql.php');
                $conn = create_connect();
                $page = (isset($_GET['pg']) == true) ? $_GET['pg'] : 0; // Đánh dấu số trang
                $muc = "";// Loại sản phẩm
                $dulieu_timkiem =  (isset($_GET["dl_timkiem"])) ? $_GET["dl_timkiem"] : null; // Lấy dữ liệu tìm kiếm
                $sql = "SELECT * FROM sanpham  LIMIT ".$page." , 12"; // Câu truy vấn sql
                $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham"; 

                if(isset($_GET['muc']) == true && is_Empty($_GET['muc']) == false) {
                    $muc = $_GET['muc'];
                    $sql = "SELECT * FROM sanpham WHERE MA_LOAI ='".$_GET['muc']."' LIMIT ".$page." , 12";
                    $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham WHERE MA_LOAI ='".$_GET['muc']."'";
                  }
                  else if($dulieu_timkiem != null) {
                    $sql = "SELECT * FROM sanpham WHERE TEN_SANPHAM LIKE'%".$dulieu_timkiem."%' LIMIT ".$page." , 12";
                    $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham WHERE TEN_SANPHAM LIKE'%".$dulieu_timkiem."%'";
                    echo '<div><span>Từ khóa "'.$dulieu_timkiem.'" có kết quả tìm kiếm là : </span></div><br>';
                  }
                  else if(isset($_GET['phanloai']) == true){

                    if(isset($_GET['toithieu']) == true && is_Empty($_GET['toithieu']) == false) $toithieu = $_GET['toithieu'];
                    else $toithieu = 0;

                    if(isset($_GET['toida']) == true && is_Empty($_GET['toida']) == false) $toida = $_GET['toida'];
                    else $toida = 999999999;
                    
                    $sql = "SELECT * FROM sanpham WHERE MA_LOAI ='".$_GET['phanloai']."' AND ( GIA > ".$toithieu." AND GIA < ".$toida.") LIMIT ".$page." , 12";
        
                    $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham WHERE MA_LOAI ='".$_GET['phanloai']."' AND ( GIA > ".$toithieu." AND GIA < ".$toida.")";
                  }
                $result = $conn->query($sql);
                 $result_soluong = $conn->query($sql_soluong);// thực hiện câu truy vấn  Lấy dữ liệu trên server bỏ vào biến này
                 $row_soluong = $result_soluong -> fetch_assoc();//  lấy dữ liệu của các dòng
                 $so_luong_int = $row_soluong['SO_LUONG'];// So lượng sản phẩm (tổng tất cả)
                  
                $dem = 0;
                if ($result->num_rows > 0) {
                    // output data of each row

                    while($row = $result->fetch_assoc()) {
                        ++$dem;
                        if($dem%6 != 0){
                        echo '<div class="item-row1">'.
                        '<a href="chitietsanpham.php? idsanpham='.$row['MA'].'">' .
                        '<img class="img-content" src="'. $row['ANH'].'">'.
                        '<div class="info">'.
                        '<p class="label-sanpham1">'.$row['TEN_SANPHAM'].'</p>'.
                        '<p class="price-sanpham1">'.str_replace(",",".",number_format($row['GIA'])).' VND</p>'.
                        '</div></a></div>';
                        
                        }
                        else {
                            echo '<div class="item-row1-tail">'.
                        '<a href="chitietsanpham.php?idsanpham='.$row['MA'].'">' .
                        '<img class="img-content" src="'. $row['ANH'].'">'.
                        '<div class="info">'.
                        '<p class="label-sanpham1">'.$row['TEN_SANPHAM'].'</p>'.
                        '<p class="price-sanpham1">'.str_replace(",",".",number_format($row['GIA'])).' VND</p>'.
                        '</div></a></div>';
                        }
                    }
                    echo '<div style = "clear:both"></div>';

                } else {
                    echo '<span style = "color:rgb(0, 155, 107);font-size:20px;width:300px;">< Không có kết quả phù hợp> </span>';
                }
                $conn->close();
            ?>
               
            </div>
            <div id="content-sotrang">
                <?php 
                    
                    $sotrang = ceil($so_luong_int/12);
                    
                    
                    for($i = 0; $i < $sotrang ; $i++){
                        $vitri = ($i * 12);
                        echo '<a href="index.php?muc='.$muc.'&pg='.$vitri.'">' . ($i+1) . '</a>';
                    }
                    echo '<div style = "clear:both"></div>';
                 ?>

            </div>
            
        </div>