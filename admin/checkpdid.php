<?php include "../connect.php"?>
<?php
    $pdid = $_GET['รหัสสินค้า'];
    $chid = $pdo->prepare("SELECT `รหัสสินค้า` FROM `สินค้า` WHERE `รหัสสินค้า`=?");
    $chid->bindParam(1,$pdid);
    $chid->execute();
    $row=$chid->fetch();
    if(!empty($row)){
        echo "1";
    }
    else{
        echo "0";
    }
?>