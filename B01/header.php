<header>
       <?php 
            $check_login = (isset($_SESSION['login']) == 'true') ? $_SESSION['login'] : 'false';
            $ho_ten = (isset($_SESSION['tendangnhap']) == 'true') ? $_SESSION['tendangnhap'] : ""; 

       ?> 
        <div class="menungang">
                       <div class="lia"><a href="#" onclick="checkgiohang()"><i class="fas fa-cart-plus"></i><b>Giỏ hàng</b></a></div>
            <div id="drop-hide">
                <?php if($check_login == 'true') echo '<div class="drop" id="dangnhap"><button class="btn-taikhoan"><b><i class="fas fa-user"></i> Tài khoản</b></button>
            <div id="mydrop" class="dropdown-content">
            <a>Thông tin tài khoản</a>
            <a href="donhang.html">Quản lý đơn hàng</a>
            <a href="dangxuat.php">Đăng xuất</a>
            </div></div>';
            else echo '<div class="dropdown" id="dangnhap"><a href="index.php?form_dangnhap=true"><b><i class="fas fa-user"></i> Đăng nhập</b></a>
            </div>';


             ?>

                </div>
            <div id="xinchao">
                <?php if($check_login == 'true') echo '<div class="content_xinchao" ><b>Xin chào, '.$ho_ten.'</b></div>'; ?> 
                <?php if($check_login == 'false') echo '<div class="lia"><a href="index.php?form_dangky=true"><b><i class="fas fa-user"></i> Đăng kí</b></a></div>'; ?>
            </div>
            
        <div style="clear: right"></div>
        </div>
        <div id="linklogo">
            <a id="trangchu" href="index.php"> <img id="logo" src="logohbshop.png" alt="H&B" width="250px" height="125px"></a>
        </div>
        <form action="index.php" method="get">
        <div class="box">
            <div class="container1">
                
                    <input type="search" name="dl_timkiem" id="search" placeholder="Tìm kiếm...">
                    
            </div>
        </div>
            <button class="btn-search"><i class="fas fa-search fa-2x"></i></button>
<!--        <input type="submit" onsubmit="timkiem()" src="logohbshop.png" width="22px" height="22px">-->
        </form>
            
        
            <div class="thanhmenu">
            <ul class="danhmuc">
                <li class="muc"><a href="index.html?newarrivals&0"><b>Bán chạy</b></a></li>
                <li class="muc"><a href="index.html?non&0"><b>Nón</b></a></li>
                <li class="muc"><a href="index.html?tuixach&0"><b>Túi Xách</b></a></li>
                <li class="muc"><a href="index.php?muc=ao&pg=0"><b>Áo</b></a></li>
                <li class="muc"><a href="index.html?daynit&0"><b>Dây Nịt</b></a></li>
                <li class="muc"><a href="index.html?giay&0"><b>Giày</b></a></li>
                <li class="muc"><a href="index.html?quan&0"><b>Quần</b></a></li>
                <li class="muc"><a href="index.html?aokhoac&0"><b>Áo khoác</b></a></li>
                <li class="muc"><a href="index.html?vongtay&0"><b>Vòng Tay</b></a></li>
                <li class="muc"><a href="index.html?dongho&0"><b>Đồng Hồ</b></a></li>

            </ul>
        </div>
    </header>