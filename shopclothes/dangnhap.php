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


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" onsubmit="return checkten();" method="post" action="checkdangnhap.php">
                    <span class="login100-form-title">
                        Đăng nhập
                    </span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                        <input class="input100" type="text" id="taikhoan" name="taikhoan" placeholder="Tên đăng nhập">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Please enter password">
                        <input class="input100" type="password" id="matkhau" name="matkhau" placeholder="Mật khẩu">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="text-right p-t-13 p-b-23">
                        <span class="txt1">
                            Quên
                        </span>

                        <a href="#" class="txt2">
                            Tên đăng nhập / Mật khẩu?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <input class="login100-form-btn" id="btn-login" type="submit" value="Đăng nhập">
                    </div>

                    <div class="flex-col-c p-t-40 p-b-40">
                        <span class="txt1 p-b-9">
                            Bạn chưa có tài khoản?
                        </span>

                        <a href="index.php?form_dangky=true" class="txt3">
                            Đăng ký ngay
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function checkten(){
        var tendangnhap = document.getElementById("taikhoan").value;
        temp = new RegExp("[\\w]{1,}$");
        kt_timkiem = temp.test(tendangnhap);
        if(!kt_timkiem){
          alert("Tên đăng nhập không hợp lệ !");
          return false;
        }
        return true;
    }
</script>
</body>

</html>
