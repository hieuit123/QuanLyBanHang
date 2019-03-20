window.onload = function () {
    loadsp();
};
var objTaikhoan = [
    {
        "tendangnhap": "tranminhhieu",
        "matkhau": "hieu123",
        "ngaydangky": "27-2-2019",
        "hovaten": "Trần Minh Hiếu"
        },
    {
        "tendangnhap": "tranchiton",
        "matkhau": "hieu123",
        "ngaydangky": "27-2-2019",
        "hovaten": "Trần Chí Tôn"
        },
    {
        "tendangnhap": "admin",
        "matkhau": "admin",
        "ngaydangky": "27-2-2014",
        "hovaten": "Trần Minh Hiếu"
        },
    ];
var objSanpham = {
    "sanpham": [
        {
            "idsanpham": 001,
            "loai": "ao",
            "ten": "Áo thun thể thao Adidas",
            "giagoc": 1500000,
            "gia": 1250000,
            "thuonghieu": "Adidas",
            "anh": "image/ao/ao0"
        },
        {
            "idsanpham": 002,
            "loai": "ao",
            "ten": "Áo thun thể thao Nike",
            "giagoc": 1600000,
            "gia": 1150000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao2"
        },
        {
            "idsanpham": 003,
            "loai": "ao",
            "ten": "Áo thun thể thao Puma",
            "giagoc": 1600000,
            "gia": 1000000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao3"
        },
        {
            "idsanpham": 004,
            "loai": "ao",
            "ten": "Ao thun năng động Superme",
            "giagoc": 1600000,
            "gia": 1250000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao4"
        },
        {
            "idsanpham": 005,
            "loai": "ao",
            "ten": "Ao thun tập gym",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao5"
        },
        {
            "idsanpham": 006,
            "loai": "ao",
            "ten": "Ao thun cotton cực mát",
            "giagoc": 130000,
            "gia": 80000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao6"
        },
        {
            "idsanpham": 007,
            "loai": "ao",
            "ten": "Sơ mi trắng sọc ngang đen (3 sọc)",
            "giagoc": 160000,
            "gia": 145000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao7"
        },
        {
            "idsanpham": 8,
            "loai": "ao",
            "ten": "Sơ mi trăng Toku",
            "giagoc": 260000,
            "gia": 250000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao8"
        },
        {
            "idsanpham": 9,
            "loai": "ao",
            "ten": "Sơ mi trăng form rộng",
            "giagoc": 160000,
            "gia": 150000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao9"
        },
        {
            "idsanpham": 10,
            "loai": "ao",
            "ten": "Sơ mi trăng công sở",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao10"
        },
        {
            "idsanpham": 11,
            "loai": "ao",
            "ten": "Áo thun in hình thỏ con",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao11"
        },
        {
            "idsanpham": 012,
            "loai": "ao",
            "ten": "Áo thun in hình Messi",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao12"
        },
        {
            "idsanpham": 013,
            "loai": "ao",
            "ten": "Sơ mi Mavel",
            "giagoc": 1600000,
            "gia": 1250000,
            "thuonghieu": "Mavel",
            "anh": "image/ao/ao13"
        },
        {
            "idsanpham": 014,
            "loai": "ao",
            "ten": "Ao thun xám sọc trẻ trung",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "image/ao/ao14"
        },
        {
            "idsanpham": 015,
            "loai": "quan",
            "ten": "Quan Joker kaki đen Hàn Quốc",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Puma",
            "anh": "image/quan/quan1"
        },
        {
            "idsanpham": 016,
            "loai": "quan",
            "ten": "Quần thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "image/quan/quan2"
        },
        {
            "idsanpham": 0017,
            "loai": "quan",
            "ten": "Quan dai kaki nâu đất",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "image/quan/quan3"
        },
        {
            "idsanpham": 0018,
            "loai": "quan",
            "ten": "Ao thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "ao1"
        },
        {
            "idsanpham": 019,
            "loai": "giay",
            "ten": "Ao thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "ao1"
        },
        {
            "idsanpham": 020,
            "loai": "giay",
            "ten": "Ao thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "ao1"
        },
        {
            "idsanpham": 021,
            "loai": "giay",
            "ten": "Ao thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "ao1"
        },
        {
            "idsanpham": 022,
            "loai": "giay",
            "ten": "Ao thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "ao1"
        },
        {
            "idsanpham": 023,
            "loai": "giay",
            "ten": "Ao thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "ao1"
        },
        {
            "idsanpham": 024,
            "loai": "giay",
            "ten": "Ao thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "ao1"
        },
        {
            "idsanpham": 025,
            "loai": "giay",
            "ten": "Ao thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "ao1"
        },
        {
            "idsanpham": 026,
            "loai": "giay",
            "ten": "Ao thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "ao1"
        },
        {
            "idsanpham": 027,
            "loai": "giay",
            "ten": "Ao thun thể thao Nike",
            "giagoc": 160000,
            "gia": 125000,
            "thuonghieu": "Nike",
            "anh": "ao1"
        }


]
};

if (localStorage.getItem("sanpham") == null) {
    var txtSanPham = JSON.stringify(objSanpham);
    localStorage.setItem("sanpham", txtSanPham);
}
if (localStorage.getItem("taikhoan") == null) {
    var txtTaikhoan = JSON.stringify(objTaikhoan);
    localStorage.setItem("taikhoan", txtTaikhoan);
}

function lay_dulieu() {
    objSanpham = JSON.parse(localStorage.getItem("sanpham"));
    objTaikhoan = JSON.parse(localStorage.getItem("taikhoan"));
}

function logout() {
    sessionStorage.setItem("login", "0");
    alert("Đăng xuất thành công !");
    document.getElementById("drop-hide").innerHTML = '<div class="dropdown" id="dangnhap"><a href="dangnhap.html"><b><i class="fas fa-user"></i> Đăng nhập</b></a>' +
        '</div></div>';
    document.getElementById("xinchao").innerHTML = '<div id="xinchao">' +
        '<div class="lia"><a href="dangky.html"><b><i class="fas fa-user"></i> Đăng kí</b></a></div>' +
        '</div>';
}

function doi_tien(num) {

    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' VND';
}

function checkgiohang() {
    var x = parseInt(sessionStorage.getItem("login"));
    if (x) {
        window.location = "giohang.html";
    } else {
        alert("Bạn chưa đăng nhập. Mời bạn đăng nhập để mua hàng");
        window.location = "dangnhap.html";
    }
}

function timkiem(dl_timkiem, n_sotrang) {
    lay_dulieu();
    dl_timkiem = dl_timkiem.toLowerCase();
    var vitri = n_sotrang * 12;
    var outscreen = "";
    var dem = 0;
    var arraytemp_sanpham = [];
    //Start Loc San PhaM nang cao

    var toithieu = 0;
    var toida = 999999999;
    var phanloai = "";
    if (document.getElementById('toida').value != "") {
        toida = document.getElementById('toida').value;
        toida = parseInt(toida);
    }
    if (document.getElementById('toithieu').value != "") {
        toithieu = document.getElementById('toithieu').value;
        toithieu = parseInt(toithieu);
    }

    phanloai = document.getElementById('phanloai').value;

    if (toida == 999999999 && toithieu == 0 && phanloai == "") {
        for (var i = 0; i < objSanpham.sanpham.length; i++) {
            if (objSanpham.sanpham[i].ten.toLowerCase().indexOf(dl_timkiem) != -1) arraytemp_sanpham.push(objSanpham.sanpham[i]);
        }
    } else {
        if (phanloai == "") {
            for (var i = 0; i < objSanpham.sanpham.length; i++) {
                if (objSanpham.sanpham[i].gia >= toithieu && objSanpham.sanpham[i].gia <= toida && objSanpham.sanpham[i].ten.toLowerCase().indexOf(dl_timkiem) != -1) arraytemp_sanpham.push(objSanpham.sanpham[i]);
            }
        } else {
            for (var i = 0; i < objSanpham.sanpham.length; i++) {
                if (objSanpham.sanpham[i].loai == phanloai && objSanpham.sanpham[i].gia >= toithieu && objSanpham.sanpham[i].gia <= toida && objSanpham.sanpham[i].ten.toLowerCase().indexOf(dl_timkiem) != -1) arraytemp_sanpham.push(objSanpham.sanpham[i]);
            }
        }

    }
    for (var i = vitri; i < arraytemp_sanpham.length; i++) {

        if ((i + 1) % 6 == 0) {
            outscreen += '<div class="item-row1-tail">' +
                '<a href="chitietsanpham.html?' + arraytemp_sanpham[i].loai + '&' + arraytemp_sanpham[i].idsanpham + '">' +
                '<img class="img-content" src="' + arraytemp_sanpham[i].anh + '.jpg">' +
                '<div class="info">' +
                '<p class="label-sanpham1">' + arraytemp_sanpham[i].ten + '</p>' +
                '<p class="price-sanpham1">' + doi_tien(arraytemp_sanpham[i].gia) + '</p>' +
                '</div></a></div>';
            ++dem;
            if (dem == 12) {

                break;
            }
            continue;
        }

        outscreen += '<div class="item-row1">' +
            '<a href="chitietsanpham.html?' + arraytemp_sanpham[i].loai + '&' + arraytemp_sanpham[i].idsanpham + '">' +
            '<img class="img-content" src="' + arraytemp_sanpham[i].anh + '.jpg">' +
            '<div class="info">' +
            '<p class="label-sanpham1">' + arraytemp_sanpham[i].ten + '</p>' +
            '<p class="price-sanpham1">' + doi_tien(arraytemp_sanpham[i].gia) + '</p>' +
            '</div></a></div>';
        ++dem;

    }
    outscreen += '<div style="clear:both"></div>';
    alert(outscreen);
    var sotrang = 0;
    sotrang = Math.ceil((arraytemp_sanpham.length) / 12);
    var lienket = "";
    for (var i = 0; i < sotrang; i++) {
        lienket += '<a href="index.php?dl_timkiem=' + dl_timkiem + '&page=' + i + '">' + (i + 1) + '</a>';

    }

    lienket += '<div style="clear:both"></div>';
    document.getElementById("content-sotrang").innerHTML = lienket;
    document.getElementById("content-main").innerHTML = outscreen;


}


function loadsp() {
    lay_dulieu();
    
    var x = parseInt(sessionStorage.getItem("login"));
    if (x) {
        document.getElementById("xinchao").innerHTML = '<div class="content_xinchao" ><b>Xin Chào, Hieu Minh Tran</b></div>';
        document.getElementById("drop-hide").innerHTML = '<div class="drop" id="dangnhap"><button class="btn-taikhoan"><b><i class="fas fa-user"></i> Tài khoản</b></button>' +
            '<div id="mydrop" class="dropdown-content">' +
            '<a>Thông tin tài khoản</a>' +
            '<a href="donhang.html">Quản lý đơn hàng</a>' +
            '<a href="#dangxuat" onclick="logout()">Đăng xuất</a>' +
            '</div></div>';
    }
    
}
function thongbao(yeucau){ 
            if(yeucau == 'dangnhap') alert("Đăng nhập thành công!");
            else if(yeucau == 'saimatkhau') alert("Sai mật khẩu hoặc tên đăng nhập")
        }
