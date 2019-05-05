<!-- Menu -->
 <?php 
 			
            $check_login = (isset($_SESSION['login'])) ? $_SESSION['login'] : false;
            $ho_ten = (isset($_SESSION['tendangnhap']) == 'true') ? $_SESSION['tendangnhap'] : "";
            $makhachhang = (isset($_SESSION['ma_khach_hang'])) ? $_SESSION['ma_khach_hang'] : "";  
       ?> 
<div class="menu">

	<!-- Search -->
	<div class="menu_search">
		<form action="danhmuc_sanpham_timkiem.php" id="menu_search_form" method="get" class="menu_search_form">
			<input type="text" class="search_input" name="dl_timkiem" placeholder="Tìm kiếm sản phẩm" required="required">
			<button class="menu_search_button"><img src="images/search.png" alt=""></button>
		</form>
	</div>
	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
					<li><a href="index.php?muc=ao&pg=0&form=sanpham">Áo</a></li>
                    <li><a href="index.php?muc=quan&pg=0&form=sanpham">Quần</a></li>
                    <li><a href="index.php?muc=non&pg=0&form=sanpham">Nón</a></li>
                    <li><a href="index.php?muc=dongho&pg=0&form=sanpham">Đồng hồ</a></li>
                    <li><a href="index.php?muc=giay&pg=0&form=sanpham">Giày</a></li>
                    <li><a href="index.php?muc=daynit&pg=0&form=sanpham">Dây nịt</a></li>
                    <li><a href="index.php?muc=aokhoac&pg=0&form=sanpham">Áo khoác</a></li>
		</ul>
	</div>
	<!-- Contact Info -->
	<div class="menu_contact">
<!--
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
			<div>+1 912-252-7350</div>
		</div>
-->
			<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<div class="logo">
				<a href="#">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div style="padding-top: 12px"><a href="index.php"><img src="images/logohbshop.png" alt="" width="120px"></a></div>
						
					</div>
				</a>	
			</div>
            <nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li class="active"><li><a href="index.php?muc=ao&pg=0&form=sanpham">Áo</a></li>
                    <li><a href="index.php?muc=quan&pg=0&form=sanpham">Quần</a></li>
                    <li><a href="index.php?muc=non&pg=0&form=sanpham">Nón</a></li>
                    <li><a href="index.php?muc=dongho&pg=0&form=sanpham">Đồng hồ</a></li>
                    <li><a href="index.php?muc=giay&pg=0&form=sanpham">Giày</a></li>
                    <li><a href="index.php?muc=daynit&pg=0&form=sanpham">Dây nịt</a></li>
                    <li><a href="index.php?muc=aokhoac&pg=0&form=sanpham">Áo khoác</a></li>
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="danhmuc_sanpham_timkiem.php" id="header_search_form" method="get">
						<input type="text" class="search_input" placeholder="Tìm kiếm sản phẩm" name="dl_timkiem" required="required">
						<button class="header_search_button"><img src="images/search.png" alt=""></button>
					</form>
				</div>
				<!-- User -->
                <div style="margin-right:25px;padding-left:0px;"><span><?php if($check_login=='true') echo "Xin chào, ".$ho_ten; ?></span></div>
                <div class="dropdown">
				<div class="user dropdown-toggle" data-toggle="dropdown"><a href="#"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
                    <?php 
                    	if($check_login=='true') {
                    		echo '<div class="dropdown-menu">
                    					<div class="dropdown-item"><a href="thongtinkhachhang.php?makhachhang='.$makhachhang.'">Thông tin cá nhân</a></div>
		                        		<div class="dropdown-item"><a href="donhang.php">Đơn hàng của tôi</a></div>
		                        		<div class="dropdown-item"><a href="dangxuat.php">Đăng xuất</a></div>
		                    		</div>';
                    	}
                    	else {
                    		echo '<div class="dropdown-menu">
		                        		<div class="dropdown-item"><a href="index.php?form_dangnhap=true">Đăng nhập</a></div>
		                        		<div class="dropdown-item"><a href="index.php?form_dangky=true">Đăng ký</a></div>
		                    		</div>';
                    	}

                     ?>
                </div>
                    <!-- Cart -->
				<div class="cart"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					
				</div>
			</div>
		</div>
	</header>

</div>