<?php include "../connect.php" ?>
<?php
    session_start();


    $stmt=$pdo->prepare("SELECT userpassaddmin.Username AS aUsername,`แอดมิน`.`ชื่อ-นามสกุล` AS afullname,
                        `แอดมิน`.`รหัสแอดมิน` AS aid FROM userpassaddmin
                        JOIN `แอดมิน` ON userpassaddmin.Username=`แอดมิน`.`Username`
                        WHERE userpassaddmin.Username=? AND password=?");
    $stmt->bindParam(1,$_POST['username']);
    $stmt->bindParam(2,$_POST['password']);
    $stmt->execute();
    $row=$stmt->fetch();
    if(!empty($row)){
        $cookie_username=$row['aUsername'];
        $cookie_value=$row['afullname'];
        setcookie($cookie_username,$cookie_value,time()+3600);
        $_SESSION['afullname']=$row['afullname'];
        $_SESSION['ausername']=$row['aUsername'];
        $_SESSION['aid']=$row['aid'];
        header("location:product_list_admin.php");
    }
    else{?>
        <script>
            alert('please check username or password');
            document.location="login.php"
        </script>
<?php
    }
?>