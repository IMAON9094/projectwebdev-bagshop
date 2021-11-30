<?php include "../connect.php" ?>
<!DOCTYPE html>
<html>
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/style_login1.css">
        <title>GARBEL_BKK</title>
        <style>
            @media (min-width: 1101px){
                header{
                    font-size:40px;
                }
                .login{
                    margin: 150px;
                    margin-left: 370px;
                    width: 400px;
                    height: 150px;
                    font-size: 25px;
                    padding: 50px 50px 0px 50px;
                    padding-bottom: 70px;
                }
            }
            @media (min-width: 430px) and (max-width: 1100px) {
                header{
                    font-size:40px;
                }
                .login{
                    margin-top: 150px;
                    width: auto;
                    height: 150px;
                    font-size: 20px;
                    padding: 40px 30px 0px 30px;
                    padding-bottom: 70px;
                }
            }
            @media (max-width: 429px) {
                header{
                    font-size:30px;
                    padding-top: 10px;
                }
                .login{
                    width: 100%;
                    min-width: 250px;
                    height: 150px;
                    margin-top: 45%;
                    font-size: 15px;
                    padding: 20px 20px 0px 20px;
                    padding-bottom: 40px;
                }
            }
        </style>
    </head>
    <body>
        <div class="login">
            <header>GARBEL_BKK</header>
            <form action="check-login.php" method="POST">
                <label>username</label>
                <input type="text" name="username" required><br>
                <label>password</label>
                <input type="password" name="password" required><br>
                <input type="submit" value="LOGIN" class="buttonlogincus-login"><br>
            </form>
            <button onclick="document.location='register.php'" class="buttonlogincus-register">REGISTER</button>
        </div>
    </body>
</html>