<?php include "../connect.php" ?>
<?php
    session_start();

    if(empty($_SESSION['ausername'])){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <?php
    $ch=$pdo->prepare("SELECT COUNT(*) FROM `คำสั่งซื้อ` WHERE `รหัสสินค้า`=?");
    $ch->bindParam(1,$_GET["รหัสสินค้า"]);
    $ch->execute();
    $row=$ch->fetch();
    if($row['COUNT(*)']==0){
        //////delete/////
        $stmt = $pdo->prepare("DELETE FROM `สินค้า` WHERE `รหัสสินค้า`=?");
        $stmt->bindParam(1, $_GET["รหัสสินค้า"]);
        if ($stmt->execute()){
            header("location: product_list_admin.php"); 
        }
    }
    else{ ?>
        <script>
            alert("ลบไม่สำเร็จเนื่องจากมีคำสั่งซื้อสินค้านี้");
            document.location="product_list_admin.php";
        </script>
<?php
    }
?>
    </body>
</html>
