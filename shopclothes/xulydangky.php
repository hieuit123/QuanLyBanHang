<script type="text/javascript">
    
    function thongbao(check){
        if (check=='tontai') {
            alert("Tên đăng nhập đã tồn tại!");
             window.location = "index.php?form_dangky=true";
             return "";
        }

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
        $trangthai = 'offline';
        //Kiem tra ten dang nhap co ton tai chua
        include('create_connect_mysql.php');
        $conn = create_connect();

        $sql_kiemtra = "SELECT * FROM khachhang WHERE TEN_DANG_NHAP='".$tendangnhap."'";
        
        $result = mysqli_query($conn,$sql_kiemtra);
        if(mysqli_num_rows($result) < 1){

        $sql = "INSERT INTO khachhang (TEN_DANG_NHAP, MAT_KHAU,HO_TEN,SDT,TRANG_THAI) VALUES ('".$tendangnhap."','".$matkhau."','".$hoten."','".$sdt."','".$trangthai."')";
        
            if(mysqli_query($conn,$sql)){
                $ma = mysqli_insert_id($conn);
                $sqlquyen = "INSERT INTO phanquyen(MA_KHACH_HANG,QUYEN) VALUES (".$ma.",1)";
                mysqli_query($conn,$sqlquyen);
                $conn->close();
                echo '<script>thongbao("thanhcong");</script>';
            }
        }
        else{
            echo '<script>thongbao("tontai");</script>';
        }

    ?>