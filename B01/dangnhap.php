
<script>

        

        if(sessionStorage.getItem("login") == 1)  window.location = "index.php";
        
        if(sessionStorage.getItem("login") == 2) window.location = "wep/admin/admin.html";

        function checkdangnhap(){
        var array_taikhoan =  JSON.parse(localStorage.getItem("taikhoan"));    
            var taikhoan=document.getElementById("taikhoan").value;
            
            var matkhau=document.getElementById("matkhau").value;
            
            var temp_taikhoan = {};
            
            var k = true;
            
            for(var i=0 ; i < array_taikhoan.length ; i++){
                
                if(array_taikhoan[i].tendangnhap == taikhoan){
                    temp_taikhoan = array_taikhoan[i];
                
                }
            }
            if(temp_taikhoan.tendangnhap=="admin"&& temp_taikhoan.matkhau=="admin"){
                
                    sessionStorage.setItem("login","2");
                    alert("Đăng nhập thành công");
                    return true;
            
                
            }
                
                if(taikhoan=="") {
                    alert("Bạn chưa nhập tên đăng nhập!");
                    return false;
                }
                if(matkhau=="") {
                    alert("Bạn chưa nhập mật khẩu");
                    return false;
                }
                if(taikhoan != temp_taikhoan.tendangnhap) {
                    k = false;
                    alert("Tên đăng nhập sai");
                }
                if(matkhau != temp_taikhoan.matkhau) {
                    k = false;
                    alert("Mật khẩu sai");
                }
                if(k == true) {
                
                    alert("Đăng nhập thành công !");
                
                    sessionStorage.setItem("login","1");
                    
                    //window.location = "index.php";
                }
            return k;
        }
 //   document.getElementById('formlogin').addEventListener('submit', checkdangnhap);
    </script>

    <div>
        <!-- onsubmit="return checkdangnhap()" -->
        <form id="formlogin" method="post" action="checkdangnhap.php"   >
           <div class="content-wellcome"> <p id="txt-wellcome">Chào mừng bạn đến với shop H&B style!</p></div>
            <div id="login">
                <div id="login-col-1">
                    <div id="login-taikhoan">
                        <label class="input-label">Tài khoản</label><br>
                        <input class="login-input" id="taikhoan" type="text" placeholder="Nhập vào tài khoản" name="taikhoan">
                    </div>
                    <div id="login-matkhau">
                        <label class="input-label">Mật khẩu</label><br>
                        <input class="login-input" id="matkhau" type="password" placeholder="Nhập vào mật khẩu" name="matkhau">
                    </div>
                    <div id="link-foget-password"><a id="txt-foget-password" href="#quenmatkhau">Quên mật khẩu?</a></div>
                </div>

                <div id="login-col-2">
                    <div class="fame-btn-login"><input id="btn-login" type="submit" value="Đăng nhập"></div>
                    <div id="txt-loginwith"><span>Hoặc đăng nhập bằng:</span></div>
                    <div><button id="btn-login-fb">Facebook</button></div>
                    <div id="sign-up"><span>Bạn chưa có tài khoản? <a href="dangky.html" style="color: #3191c4;">Đăng ký</a></span></div>
                </div>

                <div style="clear: both"></div>
            </div>

        </form>
    </div>
