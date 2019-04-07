<?php

session_start(); 
class SanPham
{
    public $ma;
    public $ten;
    public $gia;
    public $soluong;
    public $anh;
    public $thuonghieu;
    
    function SanPham($ma,$ten,$gia,$soluong,$anh,$thuonghieu){
        $this->ma = $ma;
        $this->ten = $ten;
        $this->gia = $gia;
        $this->soluong = $soluong;
        $this->anh = $anh;
        $this->thuonghieu = $thuonghieu;
    }
}
$tempsanpham = json_decode($_SESSION['sanpham']);
if(isset($_SESSION['giohang'])) {
	$array_giohang = json_decode($_SESSION['giohang']);
}
else{
	$array_giohang = array();
}
$khongtontai = true;
$key_tontai;
foreach ($array_giohang as $key => $value) {
		if($tempsanpham->ma == $value->ma) {
			$khongtontai = false;
			$key_tontai =$key;
			break; 
		}
}
if(!$khongtontai){
	$array_giohang[$key_tontai]->soluong = $array_giohang[$key_tontai]->soluong + $tempsanpham->soluong;
}
else{
	array_unshift($array_giohang, $tempsanpham);	
}
$url = "location: product.php?idsanpham=".$tempsanpham->ma;
$_SESSION['giohang'] = json_encode($array_giohang);
$_SESSION['dachon'] = 'true';
header($url);
?>