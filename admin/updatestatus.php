<?php include "../connect.php" ?>
<!DOCTYPE html>
<link rel="stylesheet" href="../style/stylecus_editstatus_admin.css">

<?php

    $ssdate=$_POST['ssdate'];
    $sstime=$_POST['sstime'];

    $stmt = $pdo->prepare("UPDATE `คำสั่งซื้อ` SET `รหัสสถานะ`=?,`วันที่สั่งสินค้า`=?,`เวลาที่สั่งสินค้า`=?
                        WHERE `รหัสลูกค้า`=? AND `วันที่สั่งสินค้า`=? AND `เวลาที่สั่งสินค้า`=? AND `รหัสสินค้า`=?");
    $stmt->bindParam(1, $_POST["status"]);
    $stmt->bindParam(2, $ssdate);
    $stmt->bindParam(3, $sstime);
    $stmt->bindParam(4, $_POST["รหัสลูกค้า"]);
    $stmt->bindParam(5, $_POST["วันที่สั่งสินค้า"]);
    $stmt->bindParam(6, $_POST["เวลาที่สั่งสินค้า"]); 
    $stmt->bindParam(7, $_POST["รหัสสินค้า"]);
    if ($stmt->execute()) 
        header("location: statusselect.php"); 
?>
<script>
    console.log('<?=$_POST["status"]?>')
</script>