    <?php 
    // Lấy dữ liệu 
        $tendangnhap = (isset($_POST['tendangnhap'])) ? $_POST['tendangnhap'] : "";
        $matkhau = (isset($_POST['matkhau'])) ? $_POST['matkhau'] : "";
        $ngaysinh = (isset($_POST['ngaysinh'])) ? $_POST['ngaysinh'] : "";
        $hoten = (isset($_POST['hoten'])) ? $_POST['hoten'] : "";
        $email = (isset($_POST['email'])) ? $_POST['email'] : "";
        $sdt = (isset($_POST['sdt'])) ? $_POST['sdt'] : "";
        $trangthai = 'false';
        
        $sql = "INSERT INTO khachhang (ID, TEN_DANG_NHAP, MAT_KHAU,HO_TEN,SDT,TRANG_THAI) VALUES (,".$tendangnhap.",".$matkhau.",".$hoten.",".$sdt.",".$trangthai.")";

    ?>