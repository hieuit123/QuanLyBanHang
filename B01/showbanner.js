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
