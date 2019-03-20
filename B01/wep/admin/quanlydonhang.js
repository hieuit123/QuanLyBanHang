window.onload = function(){
  load_donhang();  
};
var array_donhang = [];
function lay_dulieu(){
    array_donhang = JSON.parse(localStorage.getItem("donhang"));
}

function load_donhang(){
    lay_dulieu();
    alert(array_donhang[0].trangthai);
    var outscreen = '<table>'+
            '<tr style="background-color: #b2000e">'+
                '<td style="color: white;width: 220px;">Tên khách hàng</td>'+
                '<td style="color: white;width: 170px;">Thời gian đặt hàng</td>'+
                '<td style="color: white;width: 200px;">Tổng tiền</td>'+
                '<td style="color: white;width: 202px;">Trạng thái</td>'+
                '</tr>';
    alert(outscreen);
    for(var i = 0 ; i< array_donhang.length ; i++){
        outscreen += '<tr>'+
                '<td>'+'Tran mninh hieu'+'</td>'+
                    '<td>'+array_donhang[i].thoigian +'</td>'+
                    '<td>'+array_donhang[i].tongtien +'</td>'+
                    '<td>'+array_donhang[i].trangthai +'</td>'+
                '</tr>';
    }
    outscreen += '</table>';
    document.getElementById('content-donhang').innerHTML = outscreen;
    
}