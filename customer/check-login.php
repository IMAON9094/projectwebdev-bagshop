<?php include "../connect.php" ?>
<?php
    session_start();


    $stmt=$pdo->prepare("SELECT userpasscus.Username AS Username,`ลูกค้า`.`ชื่อ-นามสกุล` AS fullname,
                        `ลูกค้า`.`รหัสลูกค้า` AS cid FROM userpasscus
                        JOIN `ลูกค้า` ON userpasscus.Username=`ลูกค้า`.`Username`
                        WHERE userpasscus.Username=? AND password=?");
    $stmt->bindParam(1,$_POST['username']);
    $stmt->bindParam(2,$_POST['password']);
    $stmt->execute();
    $row=$stmt->fetch();
    if(!empty($row)){
        $cookie_username=$row['Username'];
        $cookie_value=$row['fullname'];
        setcookie($cookie_username,$cookie_value,time()+3600);
        $_SESSION['fullname']=$row['fullname'];
        $_SESSION['username']=$row['Username'];
        $_SESSION['cid']=$row['cid'];
        header("location:product-list.php");
    }
    else{?>
        <script>
            alert('please check username or password');
            document.location="login.php"
        </script>
<?php
    }
?>