window.onload = function () {
    loadchitiet();
};
var temp_sanpham;
var vitri = 0;
var objSanpham;
function logout(){
    sessionStorage.setItem("login","0");
    alert("Đăng xuất thành công !");
    document.getElementById("drop-hide").innerHTML='<div class="dropdown" id="dangnhap"><a href="dangnhap.html"><b><i class="fas fa-user"></i> Đăng nhập</b></a>'+
            '</div></div>';
}
function lay_dulieu() {
    objSanpham = JSON.parse(localStorage.getItem("sanpham"));
    
}

function doi_tien(num) {

    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' VND';
}
function checkgiohang(){
    var x= parseInt(sessionStorage.getItem("login"));
    if(x) {
        window.location="giohang.html";
    }
    else {
        alert("Bạn chưa đăng nhập. Mời bạn đăng nhập để mua hàng");
        window.location="dangnhap.html";
    }
}
function themvaogiohang(){
        temp_sanpham = objSanpham.sanpham[vitri];
        temp_sanpham.soluong = parseInt(document.getElementById("soluong").value);
        var array_giohang = [];
        var k = 1;
        if(sessionStorage.getItem("giohang") == null){
            array_giohang.unshift(temp_sanpham);
        }
        else{
            array_giohang = JSON.parse(sessionStorage.getItem("giohang"));
            
        }
        for(var i = 0; i < array_giohang.length; i++){
                if(array_giohang[i].idsanpham == temp_sanpham.idsanpham) {
                    array_giohang[i].soluong = array_giohang[i].soluong+1;
                    k=0;
                } 
            }
            if(k == 1) array_giohang.unshift(temp_sanpham);
        sessionStorage.setItem("giohang",JSON.stringify(array_giohang));
        alert("Thêm vào giỏ hàng thành công!");
    }
    function tinh(k) {
        
        k = parseInt(k);
        var sl = document.getElementById("soluong").value;
        sl = parseInt(sl);
        if (sl<1){
            document.getElementById("btngiam").disabled = true;

        } else {
            document.getElementById("btngiam").disabled = false;
            

        sl += k;
            if(!sl) sl=1;
        document.getElementById("soluong").value = sl;
        }
        
    }

function loadchitiet() {
    lay_dulieu();
    var x= parseInt(sessionStorage.getItem("login"));
    if(x){
        
        document.getElementById("drop-hide").innerHTML='<div class="drop id="dangnhap"><button class="btn-taikhoan"><b><i class="fas fa-user"></i> Tài khoản</b></button>'+
                '<div id="mydrop" class="dropdown-content">'+
                '<a>Thông tin tài khoản</a>'+
                '<a href="#dangxuat" onclick="logout()">Đăng xuất</a>'+
                '</div></div>';
    }
    var url = window.location.href;
    var chiaurl = url.split('?');
    var duoi = chiaurl[1].split('&');
    var loaihang = duoi[0];
    var mahang = duoi[1];
    mahang = parseInt(mahang);
    
    for(var i = 0; i<objSanpham.sanpham.length; i++){
        if(mahang == objSanpham.sanpham[i].idsanpham){
          vitri = i;
            break;
        } 
    }

    document.getElementById('left').innerHTML = '<img src='+ objSanpham.sanpham[vitri].anh+'.jpg width="80%">';
    document.getElementById('ten').innerHTML = objSanpham.sanpham[vitri].ten;
    document.getElementById('thuonghieu').innerHTML = objSanpham.sanpham[vitri].thuonghieu;
    document.getElementById('gia').innerHTML = doi_tien(objSanpham.sanpham[vitri].gia);
    document.getElementById('giagoc').innerHTML = doi_tien(objSanpham.sanpham[vitri].giagoc);
    document.getElementById('mota-img').innerHTML =  '<img src='+ objSanpham.sanpham[vitri].anh+'-ct.jpg>';
    
    
        
}
