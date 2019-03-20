window.onload = function(){
  load_taikhoan();  
};
var array_taikhoan = [];

function lay_dulieu(){
    array_taikhoan = JSON.parse(localStorage.getItem("taikhoan"));
}
function load_taikhoan(){
    lay_dulieu();
    var outscreen ='<table><tr style="background-color: #b2000e">'+
                '<td style="color: white;width: 220px;">Tên đăng nhập</td>'+
                '<td style="color: white;width: 170px;">Thời gian đăng kí</td>'+
                '<td style="color: white;width: 244px;">Họ và tên</td>'+
                '<td style="color: white;width: 160px;">Quản lý</td>'+
             '</tr>';
    for(var i = 0 ; i < array_taikhoan.length ; i ++){
        outscreen  += '<tr>'+
                    '<td>'+array_taikhoan[i].tendangnhap+'</td>'+
                    '<td>'+array_taikhoan[i].ngaydangky+'</td>'+
                    '<td>'+array_taikhoan[i].hovaten+'</td>'+
                    '<td><button onclick="xoa_taikhoan('+i+')">Xóa</button></td>'+
                '</tr>';
    }
    outscreen += '</table>';
    document.getElementById('content').innerHTML = outscreen;
}
function capnhat_taikhoan(){
localStorage.setItem("taikhoan",JSON.stringify(array_taikhoan));
load_taikhoan();
    
}
    
function xoa_taikhoan(vitri){
    var k = confirm("Xóa tài khoản này");
    if(k == false) return "";
    array_taikhoan.splice(vitri,1);
    capnhat_taikhoan();
    alert("Xóa thành công !");
}
function timkiem_theongay(){
    
}