<script type="text/javascript">
    
    function thongbao(check){
        if(check=='thanhcong') {
            alert("Đăng ký thành công");
            window.location = "index.php?form_dangnhap=true";
        }
        else{
            alert("Đăng ký thất bại");
            window.location = "index.php?form_dangky=true";
        }

    }
</script>

    <?php 
    // Lấy dữ liệu 
        $tendangnhap = (isset($_POST['tendangnhap'])) ? $_POST['tendangnhap'] : "";
        $matkhau = (isset($_POST['matkhau'])) ? $_POST['matkhau'] : "";
        $ngaysinh = (isset($_POST['ngaysinh'])) ? $_POST['ngaysinh'] : "";
        $hoten = (isset($_POST['hoten'])) ? $_POST['hoten'] : "";
        $email = (isset($_POST['email'])) ? $_POST['email'] : "";
        $sdt = (isset($_POST['sdt'])) ? $_POST['sdt'] : "";
        $trangthai = 'false';
        $sql = "INSERT INTO khachhang (TEN_DANG_NHAP, MAT_KHAU,HO_TEN,SDT,TRANG_THAI) VALUES ('".$tendangnhap."','".$matkhau."','".$hoten."','".$sdt."','".$trangthai."')";

        include('create_connect_mysql.php');
        $conn = create_connect();
        if(mysqli_query($conn,$sql)){
            echo '<script>alert("Đăng kí thành công !");</script>';
            header('location: index.php?form_dangnhap=dangnhap');
        }

    ?>