

<!DOCTYPE html>
<html lang="en">
<head>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	 <script type="text/javascript">
        function kiemtra(){
        	 var ten = document.getElementById("tendangnhap").value;
        	 if (ten == "") {
        	 	alert("Bạn chưa nhập tên tài khoản!");
        	 	return false;
              
              }
              var matkhau = document.getElementById("pass").value;
            var nhaplaimk = document.getElementById("repass").value;
            if (ten == "") {
            	alert("Bạn chưa nhập tên tài khoản!");
            	return false;

            }
            if (matkhau == "") {
            	alert("Bạn chưa nhập mật khẩu!");
             	return false;
             }
            if (matkhau != nhaplaimk) {
            	alert("Mật khẩu nhập lại không đúng!");
            	return false;
            }
              

             var txt_ten= document.getElementById("hoten").value;
             temp = new RegExp("[a-zA-Z\\s]{5,25}$");
             var kt_ten = temp.test(txt_ten);
             if(txt_ten == ""){
             	alert("Bạn chưa nhập họ tên");
             	return false;
             }
           
             var tam = "";
             tam = document.getElementById("sdt").value;
             var temp = new RegExp("^0[1-9][0-9]{8}$");
             var kt_sdt = temp.test(tam);
             if(!kt_sdt) alert("Số điện thoại không đúng !");
			 if(!kt_sdt) return false; 

             temp = new RegExp("^[a-z][0-9a-z\._]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$");
             var txt_email = document.getElementById("email").value;
             var kt_email = temp.test(txt_email); 
             if(!kt_email) {
                alert("Email khong hop le!");
                return false;
             }
    //         
            
    //          return true;
    return true;
        }
        
        function thongbao(){
        	alert("ddd");
        	return false;
        }
    </script>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178"  method="post" onsubmit="return kiemtra();" action="xulydangky.php" >
					<span class="login100-form-title">
						Đăng ký
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" id="tendangnhap" name="tendangnhap" placeholder="Tên đăng nhập" >
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
						<input class="input100" type="password" id="pass" name="matkhau" placeholder="Mật khẩu có ít nhất 8 kí tự">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
						<input class="input100" type="password" id="repass" name="matkhau" placeholder="Nhập lại mật khẩu">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
						<input class="input100" type="text" id="hoten" name="hoten" placeholder="Họ và tên">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
						<input class="input100" type="text" id="sdt" name="sdt" placeholder="Số điện thoại">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
						<input class="input100" type="text" id="email" name="email" placeholder="Địa chỉ Email">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" id="btn-login" type="submit" value="Đăng ký">
					</div>

					<div class="flex-col-c p-t-40 p-b-40">
						<span class="txt1 p-b-9">
							Bạn đã có tài khoản?
						</span>

						<a href="index.php?form_dangky=true" class="txt3">
							Đăng nhập ngay
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

</body>
</html>