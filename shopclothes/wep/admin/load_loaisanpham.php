<table>
        <tr>
            <th><a href="#">STT</a></th>
            <th><a href=<?php echo '"quanlyloai.php?muc_sapxep=MA_LOAI&loai='.$link_loai.'"'; ?>>Mã loại <i class="fas fa-sort"></i></a> </th>
            <th><a href=<?php echo '"quanlyloai.php?muc_sapxep=TEN_LOAI&loai='.$link_loai.'"'; ?>>Tên loại <i class="fas fa-sort"></i></a></th>
            <th><a href="#">Xử lí</a></th>
        </tr>
        <?php
            $i = 0;
            while ($row = $result->fetch_assoc()) {

                echo '<tr>
                        <td>'.++$i.'</td>
                        <td>'.$row["MA_LOAI"].'</td>
                        <td>'.$row["TEN_LOAI"].'</td>
                        <td><button class="btn-xoa" onclick="xacnhan(\'quanlyloai.php?form=sua&maloai='.$row['MA_LOAI'].'\',\'sua\')">Sửa</button><button class="btn-xoa" onclick="xacnhan(\'xoa_loai.php?maloai='.$row['MA_LOAI'].'\',\'xoa\')">Xóa</button></td>
            
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

                    <div class="tieude">Thêm loại sản phẩm</div>
    <form action="quanlyloai.php" method="get">
        <div>Mã loại sản phẩm:</div>
        <input type="text" name="ma">
        <div>Tên loại sản phẩm:</div>
        <input type="text" name="ten"><br>
        <input type="submit" name="submit" value="Thêm">
    </form>



