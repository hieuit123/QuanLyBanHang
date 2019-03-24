
var temp_sanpham;
var vitri = 0;

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
            return "true";

        } else {
            document.getElementById("btngiam").disabled = false;
            

        sl += k;
            if(!sl) sl=1;
        document.getElementById("soluong").value = sl;
        }
        
        
}
