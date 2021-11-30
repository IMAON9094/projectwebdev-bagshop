<?php include "../connect.php" ?>

<?php
    session_start();

    if(empty($_SESSION['username'])){
        header("location:login.php");
    }
    if(isset($_POST["submit"])){

        $sdate=$_POST['sdate'];
        $stime=$_POST['stime'];
        $status='ST004';


        $slip_img=$_FILES["slip_img"]["name"];
        $tmp_img=$_FILES["slip_img"]["tmp_name"];
        move_uploaded_file($tmp_img, "../photo/slip/$slip_img");


        foreach($_SESSION['cart'] as $key=>$value){
            //echo $key. " = ".$value['pid']." ".$value['pname']."<br>";
            $stmt=$pdo->prepare("INSERT INTO `คำสั่งซื้อ` VALUES (?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$_SESSION['cid']);
            $stmt->bindParam(2,$value['pid']);
            $stmt->bindParam(3,$sdate);
            $stmt->bindParam(4,$stime);
            $stmt->bindParam(5,$status);
            $stmt->bindParam(6,$value['qty']);
            $stmt->bindParam(7,$slip_img);
            $stmt->execute();
        }

        unset($_SESSION['cart']);
        header("location:product-list.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/style_payment_customer.css">
        <title>GARBEL_BKK</title>

        <style>


        @media (min-width: 430px) and (max-width: 1100px) {
                header{
                    font-size:20px;
                }
                #payment {
    width: 20%;
    font-size: 14px;
    padding: 20%;
    padding-left: 20%;
    margin: 20%;
    padding-top: 8%;
    padding-bottom: 2%;
}
input[type="submit"]{
    padding: 20%;
    width: 80%;
}
        }

@media (max-width: 429px) {
                header{
                    font-size:20px;
                }
                #payment {
    width: 20%;
    font-size: 14px;
    padding: 20%;
    padding-left: 20%;
    margin: 20%;
    padding-top: 8%;
    padding-bottom: 2%;
}
input[type="submit"]{
    padding: 20%;
    width: 80%;
}
            
            }
        </style>
        </head>
        <body>
        <div id="payment">
        <header>GARBEL_BKK</header><br>
        <div id="input">
        ช่องทางการชำระเงิน :<br><br>
        ธนาคารไทยพาณิชย์ (SCB) : xxxxxxxxxx<br>
        ชื่อบัญชี : GARBELL_BKK<br>
        </div><br><br>
        <form action="payment.php" method="POST" enctype="multipart/form-data">
            <?php date_default_timezone_set('Asia/Bangkok'); ?>
            <input type="hidden" name="sdate" value="<?=date("Y-m-d")?>">
            <input type="hidden" name="stime" value="<?=date("H:i:s")?>">
            <input type="file" name="slip_img" id="slip_img" required /><br>
            <input type="submit" name="submit" value="ยืนยัน">
        </form>
        
          </div>
    </body>
</html>