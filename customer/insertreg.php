<?php include "../connect.php" ?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <?php

        $ch=$pdo->prepare("SELECT username FROM userpasscus WHERE username=?");
        $ch->bindParam(1,$_POST["username"]);
        $ch->execute();
        $row=$ch->fetch();
        if($row["username"]!=$_POST["username"]){
            ///////insert/////////
            $stmt=$pdo->prepare("INSERT INTO userpasscus VALUES (?,?)");
            $stmt->bindParam(1,$_POST["username"]);
            $stmt->bindParam(2,$_POST["password"]);
            $stmt->execute();

            $stmt2=$pdo->prepare("INSERT INTO `ลูกค้า` VALUES ('',?,?,?)");
            $stmt2->bindParam(1,$_POST["fullname"]);
            $stmt2->bindParam(2,$_POST["address"]);
            $stmt2->bindParam(3,$_POST["username"]);
            $stmt2->execute();

            $cid = $pdo->lastInsertId();

            $stmt3=$pdo->prepare("INSERT INTO `เบอร์ลูกค้า` VALUES (?,?)");
            $stmt3->bindParam(1,$cid);
            $stmt3->bindParam(2,$_POST["tel"]);
            $stmt3->execute();

            header("location:login.php");
        }
        else{ ?>
            <script>
                alert("กรุณาเปลี่ยนusername");
                document.location="register.php";
            </script>
    <?php    }
    ?>
    </body>
</html>
