
    <script type="text/javascript">
        var array_taikhoan = JSON.parse(localStorage.getItem("taikhoan"));
        if(sessionStorage.getItem("ktdangky") == 1 ) {
            sessionStorage.setItem("ktdangky",0);
            window.location = "dangnhap.html";
        }
        function capnhat_taikhoan(){
            localStorage.setItem("taikhoan",JSON.stringify(array_taikhoan));
        }
        function kiemtra() {
            var check = true;
             var tam = "";
             tam = document.getElementById("sdt").value;
             var temp = new RegExp("^0[1-9][0-9]{8}$");
             var kt_sdt = temp.test(tam);
             if(!kt_sdt) check = false; 
             if(!kt_sdt) alert("Số điện thoại không đúng !");
             var txt_ten= document.getElementById("hoten").value;
             temp = new RegExp("[a-zA-Z\\s]{5,25}$");
             var kt_ten = temp.test(txt_ten);
             if(!kt_ten) check = false;
             if(!kt_ten) alert("Họ và tên không đúng");
             temp = new RegExp("^[a-z][0-9a-z\._]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$");
             var txt_email = document.getElementById("email").value;
             var kt_email = temp.test(txt_email); 
            if(!kt_email) {
                check = false;
                alert("Email khong hop le!");
            }
            var ten = document.getElementById("account").value;
            var matkhau = document.getElementById("pass").value;
            var nhaplaimk = document.getElementById("repass").value;
            if (ten == "") alert("Bạn chưa nhập tên tài khoản!"), return false;
            if (matkhau == "") alert("Bạn chưa nhập mật khẩu!"), return false;
            if (matkhau != nhaplaimk) alert("Mật khẩu nhập lại không đúng!"), check = false;
             return check;
        }
        function kt_ngay(ngay,thang,nam){
            var kiemtra = true;
            switch(thang){
                case 1 : if(ngay > 31 ) kiemtra = false;
                         break;
                case 2: if(nam % 4 == 0 && nam%100 != 0){
                    if(ngay > 29) kiemtra = false;
                      } 
                    else if(ngay > 28 ) kiemtra =  false;
                    break; 
                case 3: if(ngay > 31 ) kiemtra = false;
                         break;
                case 4: if(ngay > 30 ) kiemtra = false;
                         break;
                case 5: if(ngay > 31 ) kiemtra = false;
                         break;
                case 6: if(ngay > 30 ) kiemtra = false;
                         break;
                case 7: if(ngay > 31 ) kiemtra = false;
                         break;
                case 8: if(ngay > 31 ) kiemtra = false;
                         break;
                case 9: if(ngay > 30 ) kiemtra = false;
                         break;
                case 10: if(ngay > 31 ) kiemtra = false;
                         break;
                case 11: if(ngay > 30 ) kiemtra = false;
                         break;
                case 12: if(ngay > 31 ) kiemtra = false;
                         break;
                default: kiemtra = false;
            }
            return kiemtra;
        }

    </script>

        <div class="content-wellcome">
        <p id="txt-wellcome">Chào mừng bạn đến với shop H&B style!</p>
            </div>
        <form method="post" onsubmit="return kiemtra();" action="xulydangky.php">
            <div id="login">
                <div id="login-col-1">
                    <div class="signup-input">
                        <label class="input-label">Tài khoản *</label><br>
                        <input class="login-input" type="text" id="account" placeholder="Tên đăng nhập" name="tendangnhap">
                    </div>

                    
                        <div class="signup-input">
                            <label class="input-label">Mật khẩu *</label><br>
                            <input class="login-input" type="password" id="pass" placeholder="Mật khẩu có ít nhất 8 kí tự" name="matkhau">
                        </div>

                        <div class="signup-input">
                            <label class="input-label">Nhập lại mật khẩu *</label><br>
                            <input class="login-input" type="password" id="repass" placeholder="Nhập lại mật khẩu" name="nhaplaimatkhau">
                        </div>

                        <div class="signup-input">
                            <label class="input-label">Ngày sinh *</label><br>
                            <input class="login-input" type="text" id="birthday" placeholder="dd/MM/YYYY" name="ngaysinh">
                        </div>
                        <div class="signup-input">
                            <label class="input-label">Số điện thoại *</label><br>
                            <input class="login-input" type="text" placeholder="Gồm có 10 số" name="sdt">
                        </div>

                    
                </div>
                <div id="login-col-2">
                    <div class="signup-input">
                        <label class="input-label">Email *</label><br>
                        <input class="login-input-2" type="text" id="email" placeholder="Địa chỉ email" maxlength="35" name="email">
                    </div>
                    <div class="signup-input">
                        <label class="input-label">Họ và tên *</label><br>
                        <input class="login-input-2" type="text" id="hoten" placeholder="Họ tên" maxlength="35" name="hoten">
                    </div>
                    <div class="frame-btn-login"><input type="submit" id="btn-login" value="Đăng kí"></div>
                    <div id="txt-loginwith"><span>Hoặc đăng kí bằng bằng:</span></div>
                    <div><button id="btn-login-fb">Facebook</button></div>

                </div>

                <div style="clear: both"></div>
            </div>

        </form>
    