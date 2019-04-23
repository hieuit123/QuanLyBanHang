<script> 
function thongbao(check){
        if(check == 'thanhcong') {
            alert("Đăng nhập thành công !");
            window.location = "index.php";
        }
        else {
            alert("Sai tên đăng nhập hoặc mật khẩu!");
            window.location = "index.php?form_dangnhap=true";
        }
}

</script>
<?php
    session_start();
    include('create_connect_mysql.php');
    $conn = create_connect();
    $tentaikhoan = (isset($_POST['taikhoan'])) ? $_POST['taikhoan'] : '';
    $matkhau = (isset($_POST['matkhau'])) ? $_POST['matkhau'] : '';
    $sql = "SELECT * FROM khachhang WHERE TEN_DANG_NHAP = '".$tentaikhoan."'";
    
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $id = $row['ID'];
    $sql_trangthai = "UPDATE khachhang SET TRANG_THAI = 'online' WHERE ID = '".$id."'";
    mysqli_query($conn,$sql_trangthai);
    $conn->close();
    if($tentaikhoan == 'admin' && $matkhau === $row['MAT_KHAU']) echo '<script>window.location = "wep/admin";</script>';
    if($matkhau === $row['MAT_KHAU']) {
        $_SESSION["login"]='true';
        $_SESSION['tendangnhap'] = $row['HO_TEN'];
        $_SESSION['ma_khach_hang'] = $row['ID'];
        $_SESSION['sdt_khachhang'] = $row['SDT'];
        
        echo '<script>thongbao("thanhcong");</script>';
    }
    else {
        $_SESSION['thongbao_thatbai'] = 'true';
        echo '<script>thongbao("thatbai");</script>';
    }
?>
