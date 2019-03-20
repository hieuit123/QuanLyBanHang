<div class="content-banner" id="main-banner">
            <div class="slide-banner">
                <span class="icon-left" onclick="clickshow(-1)"><i class="fas fa-arrow-left fa-2x" id="icon" style="color: rgba(44, 44, 44, 0.99)"></i></span>
                <div class="icon-right" onclick="clickshow(1)"><i class="fas fa-arrow-right fa-2x" style="color: rgba(44, 44, 44, 0.99)"></i></div>
                <img class="banner" src="image/banner1.jpg">
                <img class="banner" src="image/banner2.jpg">
                <img class="banner" src="image/banner3.png">
                <img class="banner" src="image/banner4.jpg">
            </div>
            <div class="img-banner">
                <img class="img-colum" onclick="loadsp()" src="image/bannercolum1.png">
                <img class="img-colum" src="image/bannercolum2.png">
            </div>
            <div style="clear: left"></div>
        </div> 
        
        <script type="text/javascript">
            
              var index = 0;
//            var link = window.location.href;
//            var cat_chuoi = link.split("?");
//            var duoi_url = cat_chuoi[1];
//            if(duoi_url == undefined) 
            showbanner();

            function showbanner() {
                var x = document.getElementsByClassName("banner"); //gan x bang mang cac hinh anh co class banner
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }

                index++;
                if (index > x.length) index = 1;
                x[index - 1].style.display = "block";
                setTimeout(showbanner, 6000);

            }

            function clickshow(k) {
                k = parseInt(k);
                index += k;

                var x = document.getElementsByClassName("banner"); //gan x bang mang cac hinh anh co class banner
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }

                if (index > x.length) index = 1;
                if (index < 1) index = x.length;

                x[index - 1].style.display = "block";
            }

        </script>