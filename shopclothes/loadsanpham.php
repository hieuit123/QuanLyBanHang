
            <?php
                
                include('create_connect_mysql.php');
                $conn = create_connect();
                $page = (isset($_GET['pg']) == true) ? $_GET['pg'] : 0; // Đánh dấu số trang
                $muc = "";// Loại sản phẩm
                $dulieu_timkiem =  (isset($_GET["dl_timkiem"])) ? $_GET["dl_timkiem"] : null; // Lấy dữ liệu tìm kiếm
                $sql = "SELECT * FROM sanpham  LIMIT ".$page." , 8"; // Câu truy vấn sql
                $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham"; 
                    if(isset($_GET['muc']) == true && is_Empty($_GET['muc']) == false) {
                    $muc = $_GET['muc'];
                    $sql = "SELECT * FROM sanpham WHERE MA_LOAI ='".$_GET['muc']."' LIMIT ".$page." , 8";
                    $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham WHERE MA_LOAI ='".$_GET['muc']."'";
                  }
                  else if($dulieu_timkiem != null) {
                    $sql = "SELECT * FROM sanpham WHERE TEN_SANPHAM LIKE'%".$dulieu_timkiem."%' LIMIT ".$page." , 8";
                    $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham WHERE TEN_SANPHAM LIKE'%".$dulieu_timkiem."%'";
                    echo '<div style="width:350px; margin:0px auto;margin-top:120px;font-size:17px;"><span>Từ khóa "'.$dulieu_timkiem.'" có kết quả tìm kiếm là : </span></div><br>';
                  }
                  else if(isset($_GET['phanloai']) == true){

                    if(isset($_GET['toithieu']) == true && is_Empty($_GET['toithieu']) == false) $toithieu = $_GET['toithieu'];
                    else $toithieu = 0;

                    if(isset($_GET['toida']) == true && is_Empty($_GET['toida']) == false) $toida = $_GET['toida'];
                    else $toida = 999999999;
                    
                    $sql = "SELECT * FROM sanpham WHERE MA_LOAI ='".$_GET['phanloai']."' AND ( GIA > ".$toithieu." AND GIA < ".$toida.") LIMIT ".$page." , 8";
        
                    $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham WHERE MA_LOAI ='".$_GET['phanloai']."' AND ( GIA > ".$toithieu." AND GIA < ".$toida.")";
                  }
                $result = $conn->query($sql);
                 $result_soluong = $conn->query($sql_soluong);// thực hiện câu truy vấn  Lấy dữ liệu trên server bỏ vào biến này
                 $row_soluong = $result_soluong -> fetch_assoc();//  lấy dữ liệu của các dòng
                 $so_luong_int = $row_soluong['SO_LUONG'];// So lượng sản phẩm (tổng tất cả)
                  
                $dem = 0;
                        echo  '<div class="products">
			             <div class="container">';
                    
                if ($result->num_rows > 0) {
//                    <div class="row">
//					       <div class="col-lg-6 offset-lg-3">
//						  <div class="section_title text-center">Sản phẩm được thiết kế bởi H&B</div>
//					       </div>
//				            </div>
                    // output data of each row
                    include('locsanpham.php');
				    echo '<div class="row products_row">';
                    
                    while($row = $result->fetch_assoc()) {
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
                    echo '</div>
                        <!--page nav-->
                            <div class="row page_nav_row_1">
                            <div class="col">
                                <div class="page_nav_1">
                                    <ul class="d-flex flex-row align-items-start justify-content-center">';
                                        for($i = 0; $i < $sotrang ; $i++){
                                            $vitri = ($i * 8);
                                            if($page == $vitri){
                                                echo '<li class="active"><a  href="index.php?muc='.$muc.'&pg='.$vitri.'">' . ($i+1) . '</a></li>';
                                            }
                                            else{
                                                echo '<li><a href="index.php?muc='.$muc.'&pg='.$vitri.'">' . ($i+1) . '</a></li>';
                                            }
                                        }
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
                

            