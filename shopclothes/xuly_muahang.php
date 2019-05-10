<?php 
session_start();
$check_login = (isset($_SESSION['login'])) ? $_SESSION['login'] : 'false';
$ma_khach_hang = (isset($_SESSION['ma_khach_hang'])) ? $_SESSION['ma_khach_hang'] : '';
 class SanPham{
    public $ma;
    public $ten;
    public $gia;
    public $soluong;
    public $anh;
    
    function SanPham($ma,$ten,$gia,$soluong,$anh){
        $this->ma = $ma;
        $this->ten = $ten;
        $this->gia = $gia;
        $this->soluong = $soluong;
        $this->anh = $anh;
    }
}
if(isset($_SESSION['giohang']) == true){
    
    $array_giohang = json_decode($_SESSION['giohang']);
}
else {
    
    header('location: cart.php');

}
// Đơn hàng : Mã đơn tự động, mã khách hàng, thời gian đặt hàng,ma chi tiet don hang, trang thai(cho xac nhan, da xac nhan)

//chi tiet don hang : ma chi tiết don hang, ma san pham,so luong
if($check_login == 'true'){
include('create_connect_mysql.php');
$conn = create_connect();
$thoi_gian = date('Y-m-d');
$sql = "INSERT INTO donhang (MA_KHACH_HANG, THOI_GIAN, TRANG_THAI) VALUES ('".$ma_khach_hang."','".$thoi_gian."', 'Đang xử lí');";
$sql_chitiet = "INSERT INTO chitietdonhang (MA_DON, MA_SAN_PHAM, SO_LUONG, TONG_TIEN) VALUES";
if(mysqli_query($conn,$sql)){
}
$last_id = mysqli_insert_id($conn);

        foreach ($array_giohang as $key => $value){
        $tongtien = $value->soluong * $value->gia;
        $sql_chitiet .= "('".$last_id."','".$value->ma."','".$value->soluong."','".$tongtien."')";
        if($key != (count($array_giohang)-1)){
            $sql_chitiet .= ",";
         }
        else {
            $sql_chitiet .= ";";
            
        }
    }
    if( mysqli_query($conn,$sql_chitiet)){
        echo '<script>alert("Đặt hàng thành công");window.location = "cart.php";</script>';
        $_SESSION['giohang'] = null;
    }

    $conn->close();
}
else {
    
    echo '<script>alert("Bạn chưa đăng nhập! Mời bạn đăng nhập để mua hàng!");window.location = "index.php?form_dangnhap=true";</script>';
}
?>
