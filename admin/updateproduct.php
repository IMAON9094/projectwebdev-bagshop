<?php include "../connect.php" ?>
<!DOCTYPE html>
<?php
    $stmt = $pdo->prepare("UPDATE `สินค้า` SET `ชื่อสินค้า`=?, `ราคา`=?, `สีสินค้า`=?, `ลายสินค้า`=?, 
                            `ขนาดสินค้า`=?, `จำนวนสินค้าคงเหลือ`=?, `รหัสแอดมิน`=? , img_pd=? WHERE `รหัสสินค้า`=?");
    $stmt->bindParam(1, $_POST["ชื่อสินค้า"]);
    $stmt->bindParam(2, $_POST["ราคา"]);
    $stmt->bindParam(3, $_POST["สีสินค้า"]);
    $stmt->bindParam(4, $_POST["ลายสินค้า"]); 
    $stmt->bindParam(5, $_POST["ขนาดสินค้า"]);
    $stmt->bindParam(6, $_POST["จำนวนสินค้าคงเหลือ"]);
    $stmt->bindParam(7, $_POST["รหัสแอดมิน"]);
    $stmt->bindParam(8, $_POST["img_pd"]);
    $stmt->bindParam(9, $_POST["รหัสสินค้า"]); 
    if ($stmt->execute()) 
        header("location: product_list_admin.php"); 
?>