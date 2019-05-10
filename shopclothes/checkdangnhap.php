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
    $sql = "SELECT * FROM khachhang kh,phanquyen pq WHERE TEN_DANG_NHAP = '".$tentaikhoan."' AND kh.ID=pq.MA_KHACH_HANG";
    
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $id = $row['ID'];
    $sql_trangthai = "UPDATE khachhang SET TRANG_THAI = 'online' WHERE ID = '".$id."'";
    mysqli_query($conn,$sql_trangthai);
    $conn->close();
    if($matkhau === $row['MAT_KHAU']){
    if($row["QUYEN"] == "0"){
            $_SESSION["login"]='true';
            $_SESSION["quyen"] = $row['QUYEN'];
            $_SESSION['tendangnhap'] = $row['HO_TEN'];
            $_SESSION['ma_khach_hang'] = $row['ID'];
            $_SESSION['sdt_khachhang'] = $row['SDT'];
            $_SESSION['dia_chi'] = $row['DIA_CHI'];
        echo '<script>window.location = "wep/admin";</script>';
    }
    else{
            $_SESSION["login"]='true';
            $_SESSION["quyen"] = $row['QUYEN'];
            $_SESSION['tendangnhap'] = $row['HO_TEN'];
            $_SESSION['ma_khach_hang'] = $row['ID'];
            $_SESSION['sdt_khachhang'] = $row['SDT'];
            $_SESSION['dia_chi'] = $row['DIA_CHI'];
            echo '<script>thongbao("thanhcong");</script>';
    }
}
else {
            $_SESSION['thongbao_thatbai'] = 'true';
            echo '<script>thongbao("thatbai");</script>';
        }
?>
