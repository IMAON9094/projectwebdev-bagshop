<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style/stylecus_register_ajax.css">
        <title>GARBEL_BKK</title>
        <script>
            var http;
            function sendAJ(){
                http=new XMLHttpRequest();
                http.onreadystatechange=checkusn;

                var username = document.getElementById('username').value;
                var url = "checkusername.php?username="+username;

                http.open("GET",url);
                http.send();
            }
            function checkusn(){
                if(http.readyState==4&&http.status==200){
                    if(http.responseText=='1'){
                        document.getElementById('username').className="denied";
                        document.getElementById('username').focus();
                    }
                    else if(http.responseText=='0'){
                        document.getElementById('username').className="approve";

                    }
                }
            }
            function checkpass(){
                let password = document.getElementById('password');
                let password2 = document.getElementById('password2');
                if(password.value!=password2.value){
                    password2.style.backgroundColor="rgba(255, 0, 0, 0.603)";
                    password2.focus();
                }
                else{
                    password2.style.backgroundColor="unset";
                }
            }
        </script>
    </head>
    <body>
        <div id="registerform">
            <header>GARBEL_BKK</header>
            <div>
                <form action="insertreg.php" method="POST">
                    <div id="input">
                        <label>username</label>
                        <input type="text" name="username" required onblur="sendAJ()" id="username"><br>
                        <label>password</label>
                        <input type="password" name="password" required id="password"><br>
                        <label>check password</label>
                        <input type="password" name="password2" required id="password2" onblur="checkpass()"><br>
                        <label>ชื่อ-นามสกุล</label>
                        <input type="text" name="fullname" pattern="[ก-๙a-zA-Z\s]{1,}" required><br>
                        <label>ที่อยู่</label>
                        <input type="text" name="address" required><br>
                        <label>เบอร์โทรศัพท์</label>
                        <input type="text" name="tel" required pattern="[0-9]{10}"><br>
                    </div>
                    <input type="submit" value="submit" class="button">
                </form>
            </div>
        </div>
    </body>
</html>