<?php
                session_start();
                include('connect.php');
                $conn = create_connect_mysql();
                $page = (isset($_GET['pg']) == true) ? $_GET['pg'] : 0; // Đánh dấu số trang
                $timkiem = (isset($_GET['pg']) == 'false') ? 'false' : 'true';
                if($timkiem == "false") $_SESSION['dulieu_timkiem'] = "";
                $toida=999999999;
                $toithieu=0;
                $muc = "";// Loại sản phẩm
                // start lấy dữ liệu tìm kiếm
                if(isset($_GET["dl_timkiem"])){
                    $dulieu_timkiem = $_GET["dl_timkiem"];    
                }
                else{ 
                    $dulieu_timkiem =  $_SESSION["dulieu_timkiem"];
                }
                //end lấy dữ liệu tìm kiểm
                //start lấy dữ liệu toàn bộ sản phẩm
                $sql = "SELECT * FROM sanpham  LIMIT ".$page." , 8"; // Câu truy vấn sql
                $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham";
                //end 
                    //start lấy dữ liệu tìm kiếm nâng cao 

                    if(isset($_GET['phanloai'])== true && $_GET["phanloai"] != "" ){
                    $_SESSION["dulieu_timkiem"] = "";
                    $muc = $_GET['phanloai'];
                    $sql = "SELECT * FROM sanpham WHERE MA_LOAI ='".$_GET['phanloai']."' LIMIT ".$page." , 8";
                    $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham WHERE MA_LOAI ='".$_GET['phanloai']."'";
                    if(isset($_GET['toida'])){
                    if($_GET['toithieu'] != "" ) $toithieu = $_GET['toithieu'];
                    if($_GET['toida'] != "" ) $toida = $_GET['toida'];
                    //if(($toithieu) $toithieu = 999999999;
                    //if(is_string($toida+1)) $toida = 999999999;
                    $sql = "SELECT * FROM sanpham WHERE MA_LOAI ='".$muc."' AND ( GIA >= ".$toithieu." AND GIA <= ".$toida.")  AND TEN_SANPHAM LIKE '%".$dulieu_timkiem."%' LIMIT ".$page." , 8";
        
                    $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham WHERE MA_LOAI ='".$muc."' AND ( GIA >= ".$toithieu." AND GIA <= ".$toida.")  AND TEN_SANPHAM LIKE '%".$dulieu_timkiem."%'";
                    }
                  }// End nâng cao
                  else if($dulieu_timkiem != null){ // Nếu có dữ liệu tìm kiếm thì tìm
                    $_SESSION['dulieu_timkiem'] = $dulieu_timkiem;
                    $sql = "SELECT * FROM sanpham WHERE TEN_SANPHAM LIKE'%".$dulieu_timkiem."%' LIMIT ".$page." , 8";
                    $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham WHERE TEN_SANPHAM LIKE'%".$dulieu_timkiem."%'";
                    echo '<div style="width:350px; margin:0px auto;margin-top:120px;font-size:17px;"><span>Từ khóa "'.$dulieu_timkiem.'" có kết quả tìm kiếm là : </span></div><br>';
                  }// end tìm kiếm bình thường
                 
                 if($result = $conn->query($sql)){
                 $result_soluong = $conn->query($sql_soluong);// thực hiện câu truy vấn  Lấy dữ liệu trên server bỏ vào biến này
                 $row_soluong = $result_soluong -> fetch_assoc();//  lấy dữ liệu của các dòng
                 $so_luong_int = $row_soluong['SO_LUONG'];// So lượng sản phẩm (tổng tất cả)
                  }
                  else {
                    $so_luong_int =0;
                  }
                $dem = 0;
                        echo  '<div class="products">
                         <div class="container">';
                    
                if ($so_luong_int > 0) {
//                    <div class="row">
//                         <div class="col-lg-6 offset-lg-3">
//                        <div class="section_title text-center">Sản phẩm được thiết kế bởi H&B</div>
//                         </div>
//                          </div>
                    // output data of each row
                    include('locsanpham.php');
                    echo '<div class="row products_row">';
                    
                    while($row = $result->fetch_assoc()){
                        echo '<a href="product.php?idsanpham='.$row['MA'].'">
                    <div class="col-xl-3 col-md-4">
                        <div class="product">
                            <div class="product_image"><img src="images/'.$row['ANH'].'" alt=""></div>
                            <div class="product_content">
                                <div class="info_sanpham">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="product.php?idsanpham='.$row['MA'].'"><div class="label">'.$row['TEN_SANPHAM'].'</div></a></div>
                                            <div class="thuonghieu"><a href="#">'.$row['THUONGHIEU'].'</a></div>
                                        </div>
                                    </div>
                                       <div class="gia">
                                        <div class="product_price text-right"><span>'.str_replace(",",".",number_format($row['GIA'])).'</span>VND</div>
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </a>';
                        
                        }
                     $sotrang = ceil($so_luong_int/8);
                     if($page/8 > 2){
                     $trangbatdau = ($page/8)-2;
                     $trangketthuc = $trangbatdau + 5;
                     }
                     else{
                        $trangbatdau = 0;
                        $trangketthuc = $trangbatdau + 5;
                     }
                     if($sotrang < 6){
                        $trangbatdau =0;
                        $trangketthuc = $sotrang;
                     }
                       echo '</div>
                        <!--page nav-->
                            <div class="row page_nav_row_1">
                            <div class="col">
                                <div class="page_nav_1">
                                    <ul class="d-flex flex-row align-items-start justify-content-center">';
                                    if($page != 0 ) echo '<li><a href="index.php?form=sanpham&phanloai='.$muc.'&pg='.($page -8).'&toithieu='.$toithieu.'&toida='.$toida.'"><-</a></li>';
                                        for($i = $trangbatdau; $i < $trangketthuc ; $i++){
                                            $vitri = ($i * 8);
                                            if($page == $vitri){
                                                echo '<li class="active"><a  href="index.php?form=sanpham&phanloai='.$muc.'&pg='.$vitri.'&toithieu='.$toithieu.'&toida='.$toida.'">' . ($i+1) .'</a></li>';
                                            }
                                            else{
                                                echo '<li><a href="index.php?form=sanpham&dl_timkiem='.$dulieu_timkiem.'&phanloai='.$muc.'&pg='.$vitri.'&toithieu='.$toithieu.'&toida='.$toida.'">'.($i+1).'</a></li>';
                                            }
                                        }
                                    if($page/8 != $sotrang -1)echo '<li><a href="index.php?form=sanpham&phanloai='.$muc.'&pg='.($page + 8).'&toithieu='.$toithieu.'&toida='.$toida.'">-></a></li>';
                                    echo '</ul>
                                </div>
                            </div>
                        </div>
                            <!--  End page nav -->
                         </div>
                    </div>';
                }
                else {
                    echo '<div style="padding-top:100px"><span style = "color:rgb(0, 155, 107);font-size:20px;width:300px;">< Không có kết quả phù hợp> </span></div>';
                }
                $conn->close();
                ?>