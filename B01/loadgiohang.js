
var objSanpham;
var objTaikhoan;
var array_giohang = [];
var tongtien;
function lay_dulieu() {
    objSanpham = JSON.parse(localStorage.getItem("sanpham"));
    objTaikhoan = JSON.parse(localStorage.getItem("taikhoan"));
    array_giohang = JSON.parse(sessionStorage.getItem("giohang"));
}
function doi_tien(num) {

    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' VND';
}

function logout(){
    sessionStorage.setItem("login","0");
    alert("Đăng xuất thành công !");
    document.getElementById("drop-hide").innerHTML='<div class="dropdown" id="dangnhap"><a href="dangnhap.html"><b><i class="fas fa-user"></i> Đăng nhập</b></a>'+
            '</div></div>';
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
function muahang(){
    if(sessionStorage.getItem("giohang") == "[]"){
        alert("Giỏ hàng trống! Mời bạn tiếp tục mua hàng")
        return "";
    }
    var thoigian = new Date();
    var donhang = {};
    donhang.thoigian = thoigian.getDate()+"&"+thoigian.getMonth()+"&"+thoigian.getFullYear();
    donhang.dulieu = JSON.stringify(array_giohang);
    donhang.trangthai = "false";  // false là chưa xử lí   true là đã xử lí 
    donhang.tongtien = tongtien;
    
    var array_donhang = [];
    if(localStorage.getItem("donhang") != null ) {
        array_donhang = JSON.parse(localStorage.getItem("donhang"));
    }
    array_donhang.unshift(donhang);
    localStorage.setItem("donhang",JSON.stringify(array_donhang));
    alert("Đặt hàng thành công!");
}
function capnhat_giohang(){
    sessionStorage.setItem("giohang",JSON.stringify(array_giohang));
    loadgiohang();
}
function xoa_sanpham(vitri){
    array_giohang.splice(vitri,1);
    capnhat_giohang();
}
function loadgiohang(){
    lay_dulieu();
    if(sessionStorage.getItem("giohang") == "[]"){
        document.getElementById("content").innerHTML = '<div style = "width:200px;margin:20px auto;"><span style = "color:blue;font-size:20px">(Giỏ hàng trống)</span></div>';
        return "";
    }
    var x= parseInt(sessionStorage.getItem("login"));
    if(x){
        
        document.getElementById("drop-hide").innerHTML='<div class="drop id="dangnhap"><button class="btn-taikhoan"><b><i class="fas fa-user"></i> Tài khoản</b></button>'+
                '<div id="mydrop" class="dropdown-content">'+
                '<a>Thông tin tài khoản</a>'+
            '<a>Quản lý đơn hàng</a>' +
                '<a href="#dangxuat" onclick="logout()">Đăng xuất</a>'+
                '</div></div>';
    }
    
    var outscreen="";
    tongtien = 0;
    var tongsl = 0;
    for(var i = 0 ; i < array_giohang.length ; i++){
        outscreen += '<div class="canhle">'+
         '<div class="content-sanpham">'+
            '<img src="'+array_giohang[i].anh+'.jpg" alt="aothun001">'+
             '<div id="content-title"><p>'+array_giohang[i].ten+'</p><br>'+
                 '<button id="btn-xoa" onclick="xoa_sanpham('+i+')"><i class="far fa-trash-alt"></i></button><button id="btn-yeuthich"><i class="far fa-heart"></i></button>'+
             '</div>'+
             '<span style="clear: both"></span>'+
        '</div>'+
        '<div class="content-price"><span class="price"></span>'+doi_tien(array_giohang[i].gia)+'</div>'+
        '<div class="content-soluong">'+
                    '<button id="btngiam" onclick="tinh(-1)" disabled>-</button><input type="text" id="soluong" value="'+array_giohang[i].soluong+'"> <button onclick="tinh(1)">+</button>'+
                    '<div style="clear: both"></div>'+
        '</div>'+
            '<div style="clear: both"></div>'+
            '</div>';
        tongtien += array_giohang[i].gia*array_giohang[i].soluong;
        tongsl += array_giohang[i].soluong;
    }
    
    document.getElementById("danhsach-sp").innerHTML=outscreen;
    document.getElementById("tongslsp").innerHTML=tongsl;
    document.getElementById("tongcongtien").innerHTML=doi_tien(tongtien);
    
    
}   

function tinh(k) {

        k = parseInt(k);
        var sl = document.getElementById("soluong").value;
        sl = parseInt(sl);
        if (sl < 2) {
            document.getElementById("btngiam").disabled = true;

        } else document.getElementById("btngiam").disabled = false;

        sl += k;
        document.getElementById("soluong").value = sl;
    }