<!-- Menu -->
 <?php 	
 			include("create_connect_mysql.php");
            $check_login = (isset($_SESSION['login'])) ? $_SESSION['login'] : false;
            $ho_ten = (isset($_SESSION['tendangnhap']) == 'true') ? $_SESSION['tendangnhap'] : "";
            $makhachhang = (isset($_SESSION['ma_khach_hang'])) ? $_SESSION['ma_khach_hang'] : "";
     	   $conn = create_connect();  
		    $sql_loai = "SELECT * FROM loaisanpham";
		    $result_loai = mysqli_query($conn,$sql_loai);
		    $conn->close();
       ?> 
<div class="menu">

	<!-- Search -->
	
	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
					<li><a href="index.php?phanloai=ao&pg=0&form=sanpham&timkiem=false">Áo</a></li>
                    <li><a href="index.php?phanloai=quan&pg=0&form=sanpham&timkiem=false">Quần</a></li>
                    <li><a href="index.php?phanloai=non&pg=0&form=sanpham&timkiem=false">Nón</a></li>
                    <li><a href="index.php?phanloai=dongho&pg=0&form=sanpham&timkiem=false">Đồng hồ</a></li>
                    <li><a href="index.php?phanloai=giay&pg=0&form=sanpham&timkiem=false&timkiem=false">Giày</a></li>
                    <li><a href="index.php?phanloai=daynit&pg=0&form=sanpham&timkiem=false">Dây nịt</a></li>
                    <li><a href="index.php?phanloai	=aokhoac&pg=0&form=sanpham&timkiem=false">Áo khoác</a></li>
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
					<!-- <li class="active"><li><a href="index.php?phanloai=ao&pg=0&form=sanpham&timkiem=false">Áo</a></li>
                    <li><a href="index.php?phanloai=quan&pg=0&form=sanpham&timkiem=false">Quần</a></li>
                    <li><a href="index.php?phanloai=non&pg=0&form=sanpham&timkiem=false">Nón</a></li>
                    <li><a href="index.php?phanloai=dongho&pg=0&form=sanpham&timkiem=false">Đồng hồ</a></li>
                    <li><a href="index.php?phanloai=giay&pg=0&form=sanpham&timkiem=false">Giày</a></li>
                    <li><a href="index.php?phanloai=daynit&pg=0&form=sanpham&timkiem=false">Dây nịt</a></li>
                    <li><a href="index.php?phanloai=aokhoac&pg=0&form=sanpham&timkiem=false">Áo khoác</a></li>
					 --><?php 
					$i=0;
						while ($row_loai = $result_loai->fetch_assoc()){
							if(++$i == 8) break;
							echo '<li><a href="index.php?phanloai='.$row_loai["MA_LOAI"].'&pg=0&form=sanpham&timkiem=false">'.$row_loai["TEN_LOAI"].'</a></li>';
						}
					?>
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="#" method="get" onSubmit="return laySPTimKiem(this)" id="header_search_form">
						<input type="text" class="search_input" placeholder="Tìm kiếm sản phẩm" id="dl_timkiem" name="dl_timkiem" required="required">
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