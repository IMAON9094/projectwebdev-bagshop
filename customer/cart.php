<?php include "../connect.php" ?>

<?php
    session_start();

    if(empty($_SESSION['username'])){
        header("location:login.php");
    }
?>

<?php    

    if($_GET["action"]=='add'){
        $pid = $_GET["pid"];

        //////database///////
        $stmt=$pdo->prepare("SELECT * FROM `สินค้า` WHERE `รหัสสินค้า`=?");
        $stmt->bindParam(1,$pid);
        $stmt->execute();
        $row=$stmt->fetch();
        ////////////////////

        $cart_item=array(
            'pid' => $pid,
            'pname' => $row["ชื่อสินค้า"],
            'price'=> $row["ราคา"],
            'imgpd' => $row["img_pd"],
            'qty' => $_POST["quantity"]
        );

        ////ตอนยังไม่มีสินค้าในตะกร้า////
        if(empty($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }

        ////เลือกสินค้าซ้ำ////
        if(array_key_exists($pid,$_SESSION['cart'])){
            $_SESSION['cart'][$pid]['qty']+=$_POST["quantity"];
        }
        ////ไม่เคยเลือกสินค้านี้////
        else{
            $_SESSION['cart'][$pid] = $cart_item;
        }
    }
    else if($_GET["action"]=='del'){
        $pid = $_GET['pid'];
        unset($_SESSION['cart'][$pid]);
    }
    else if($_GET["action"]=="show"){
        if(empty($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GARBEL_BKK</title>
        <link rel="stylesheet" href="../style/stylecart1.css">
    </head>
    <body>
        <header>GARBEL_BKK
        <div class="abc"><b><a href="product-list.php" id="home">HOME</a>
        <a href="payment.php" id="pay">สั่งซื้อ</a></b></div>
        </header>
        
        <form>
            <table>
                    <tr>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th colspan="2">จำนวนสินค้า</th>
                    </tr>
                <?php
                    $sum=0;
                    foreach ($_SESSION['cart'] as $item) {
                        $sum+=$item['price']*$item['qty'];
                ?>
                    <tr>
                        <td>
                            <img src="../photo/product/<?=$item["imgpd"]?>" alt="<?=$item["imgpd"]?>" width="100"><br>
                            <?=$item['pname']?>
                        </td>
                        <td><?=$item['price']*$item['qty']?></td>
                        <td>
                            <?=$item['qty']?>
                            <b><a href="?action=del&pid=<?=$item['pid']?>">del</a></b>
                        </td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td>total: </td>
                        <td colspan="3"><?=$sum?> bath</td>
                    </tr>
            </table>
        </form>
    </body>
</html>