
<?php
     include('connect.php');
     $page = (isset($_GET['pg']) == true) ? $_GET['pg'] : 0;
     $conn = create_connect_mysql();
     $sql = "SELECT * FROM sanpham  LIMIT ".$page." , 8";
     $sql_soluong = "SELECT COUNT(MA) as SO_LUONG FROM sanpham";
     $result_soluong = $conn->query($sql_soluong);
     $row_soluong = $result_soluong->fetch_assoc();
     $so_luong_int = $row_soluong['SO_LUONG'];
	 $result = $conn->query($sql);


        if(isset($_GET['pg']) == false){
		include('banner.php');
        }
	        echo  '<div class="products">
			             <div class="container">
			             <div style=" width:230px;margin:100px auto;font-size:30px;color:#FFC756;"><b><u>Tất cả sản phẩm</u></b></div>

			             ';
                    
                if ($result->num_rows > 0) {
//                    <div class="row">
//					       <div class="col-lg-6 offset-lg-3">
//						  <div class="section_title text-center">Sản phẩm được thiết kế bởi H&B</div>
//					       </div>
//				            </div>
                    // output data of each row
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
                     if($page/8 > 2){
                     $trangbatdau = ($page/8)-2;
                     $trangketthuc = $trangbatdau + 5;
                     }
                     else{
                        $trangbatdau = 0;
                        $trangketthuc = $trangbatdau + 5;
                     }

                     if( ($page/8) == ($sotrang-2) || ($page/8) == ($sotrang-1) ){
                        $trangbatdau -= 2;
                        $trangketthuc = $sotrang;  
                     }

 	                   echo '</div>
                        <!--page nav-->
                            <div class="row page_nav_row_1">

                            <div class="col">
                                <div class="page_nav_1">

                                    <ul class="d-flex flex-row align-items-start justify-content-center">';

                                    if($page != 0) echo '<li><a href="index.php?pg='.($page-8).'"><-</a></li>';

                                        for($i = $trangbatdau; $i < $trangketthuc ; $i++){
                                            $vitri = ($i * 8);
                                            if($page == $vitri){
                                                echo '<li class="active"><a>' . ($i+1) . '</a></li>';
                                            }
                                            else{
                                                echo '<li><a href="index.php?pg='.$vitri.'">' . ($i+1) . '</a></li>';
                                            }
                                        }
                                    if($page/8 != $sotrang-1) echo '<li><a href="index.php?pg='.($page+8).'">-></a></li>';
                                    echo '</ul>
                                </div>
                            </div>
                        </div>
                            <!--  End page nav -->
                         </div>
                    </div>';
                }

                $conn->close();
?>