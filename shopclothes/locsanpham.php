<?php 
    $sql_loai = "SELECT * FROM loaisanpham";
    $result_loai = mysqli_query($conn,$sql_loai);
    
?>

<div style="float:right; padding-top:112px;" id="loc">
    <form action="#" method="get" onSubmit="return locSPTimKiem(this)">
        <label>Loại:</label>
        <select id="phanloai" name="phanloai">
                        <option value="" selected>[Lựa chọn]</option>
<!--             <option value="" selected>[Lựa chọn]</option>

            <option value="ao">Áo</option>
            <option value="quan">Quần</option>
            <option value="non">Nón</option>
            <option value="giay">Giày</option>
            <option value="aokhoac">Áo khoác</option>
            <option value="daynit">Dây nịt</option>
            <option value="dongho">Đồng hồ</option> -->
            <?php 
            while ( $row_loai = $result_loai->fetch_assoc() ) {
                echo '<option value="'.$row_loai["MA_LOAI"].'">'.$row_loai["TEN_LOAI"].'</option>';
            } ?>
        </select>
        <label>Giá:</label>
        <input style="margin-top:5px" name="toithieu" id="toithieu" type="text" placeholder="Tối thiểu"> <input id="toida" name="toida" style="margin-top:5px" type="text" placeholder="Tối đa">
        <input type="submit" name="" value="Lọc">
    </form>
</div>
<div style="clear:right"></div>
