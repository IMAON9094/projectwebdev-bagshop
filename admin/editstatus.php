<?php include "../connect.php" ?>
<?php
    session_start();

    if(empty($_SESSION['ausername'])){
        header("location:login.php");
    }
?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM `คำสั่งซื้อ` WHERE `รหัสลูกค้า`=? AND `วันที่สั่งสินค้า`=? AND `เวลาที่สั่งสินค้า`=? AND `รหัสสินค้า`=?");
    $stmt->bindParam(1, $_GET["cid"]);
    $stmt->bindParam(2, $_GET["dt"]);
    $stmt->bindParam(3, $_GET["tm"]);
    $stmt->bindParam(4, $_GET["pid"]);
    $stmt->execute(); 
    $row = $stmt->fetch(); 

    $st=$pdo->prepare("SELECT * FROM `สถานะสินค้า`");
    $st->execute();
?>
<html>
<head><meta charset="utf-8">
<link rel="stylesheet" href="../style/style_editstatus_admin.css">
</head>
<body>
<div id="editstatus">
<header>GARBEL_BKK</header>
    <form action="updatestatus.php" method="post">
    <div id="input">
        รหัสลูกค้า : <input type="text" name="รหัสลูกค้า" value="<?=$row["รหัสลูกค้า"]?>" readonly ><br>
        วันที่สั่งสินค้า : <input type="text" name="วันที่สั่งสินค้า" value="<?=$row["วันที่สั่งสินค้า"]?>" readonly><br>
        <input type="hidden" name="ssdate" value="<?=date("Y-m-d")?>">
        เวลาที่สั่งสินค้า : <input type="text" name="เวลาที่สั่งสินค้า" value="<?=$row["เวลาที่สั่งสินค้า"]?>" readonly><br>
        <input type="hidden" name="sstime" value="<?=date("H:i:s")?>">
        รหัสสินค้า : <input type="text" name="รหัสสินค้า" value="<?=$row["รหัสสินค้า"]?>" readonly><br>
        <select name="status" id="status">
            <option value="">-----</option>
            <?php while($so=$st->fetch()){ ?>
           <option value="<?=$so['รหัสสถานะ']?>"><?=$so['สถานะของสินค้า']?></option><br>
            <?php } ?>
        </select>
        </div>
        <br><br><input type="submit" value="ยืนยัน">
    </form>
    </div>
</body>
</html>