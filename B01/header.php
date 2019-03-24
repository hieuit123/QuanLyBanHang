<header>
       <?php 
            $check_login = (isset($_SESSION['login'])) ? $_SESSION['login'] : false;
            $ho_ten = (isset($_SESSION['tendangnhap']) == 'true') ? $_SESSION['tendangnhap'] : ""; 

       ?> 
        <div class="menungang">
                       <div class="lia"><a href="giohang.php" ><i class="fas fa-cart-plus"></i><b>Giỏ hàng</b></a></div>
            <div id="drop-hide">
                <?php if($check_login) echo '<div class="drop" id="dangnhap"><button class="btn-taikhoan"><b><i class="fas fa-user"></i> Tài khoản</b></button>
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
                <?php if($check_login) echo '<div class="content_xinchao" ><b>Xin chào, '.$ho_ten.'</b></div>'; ?> 
                <?php if(!$check_login) echo '<div class="lia"><a href="index.php?form_dangky=true"><b><i class="fas fa-user"></i> Đăng kí</b></a></div>'; ?>
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
                <li class="muc"><a href="index.php?muc=trangchu&pg=0&form=search"><b>Bán chạy</b></a></li>
                <li class="muc"><a href="index.php?muc=non&pg=0&form=search"><b>Nón</b></a></li>
                <li class="muc"><a href="index.php?muc=tuixach&pg=0&form=search"><b>Túi Xách</b></a></li>
                <li class="muc"><a href="index.php?muc=ao&pg=0&form=search"><b>Áo</b></a></li>
                <li class="muc"><a href="index.php?muc=daynit&pg=0&form=search"><b>Dây Nịt</b></a></li>
                <li class="muc"><a href="index.php?muc=giay&pg=0&form=search"><b>Giày</b></a></li>
                <li class="muc"><a href="index.php?muc=quan&pg=0&form=search"><b>Quần</b></a></li>
                <li class="muc"><a href="index.php?muc=aokhoac&pg=0&form=search"><b>Áo khoác</b></a></li>
                <li class="muc"><a href="index.php?muc=vongtay&pg=0&form=search"><b>Vòng Tay</b></a></li>
                <li class="muc"><a href="index.php?muc=dongho&pg=0&form=search"><b>Đồng Hồ</b></a></li>

            </ul>
        </div>
    </header>