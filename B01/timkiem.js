function timkiem(dl_timkiem, n_sotrang) {
    lay_dulieu();
    dl_timkiem = dl_timkiem.toLowerCase();
    var vitri = n_sotrang * 12;
    var outscreen = "";
    var dem = 0;
    var arraytemp_sanpham = [];
    for (var i = 0; i < objSanpham.sanpham.length; i++) {
        if (objSanpham.sanpham[i].ten.toLowerCaseb ().indexOf(dl_timkiem) != -1) arraytemp_sanpham.push(objSanpham.sanpham[i]);
    }
    for (var i = 0; i < arraytemp_sanpham.length; i++) {

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
    var sotrang = 0;
    sotrang = Math.ceil((arraytemp_sanpham.length) / 12);
    var lienket = "";
    for (var i = 0; i < sotrang; i++) {
        lienket += '<a href="index.php?dl_timkiem=' + dl_timkiem + '&page=' + i + '">' + (i + 1) + '</a>';

    }

    lienket += '<div style="clear:both"></div>';
    alert(outscreen);
    alert(lienket);
   document.getElementById("content-sotrang").innerHTML = lienket;
    document.getElementById("content-main").innerHTML = outscreen;
    alert("davaoss");

}