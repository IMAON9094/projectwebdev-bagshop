<?php include "../connect.php" ?>
<?php
    session_start();

    if(empty($_SESSION['ausername'])){
        header("location:login.php");
    }
?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM `สินค้า` WHERE `รหัสสินค้า`=?");
    $stmt->bindParam(1, $_GET["รหัสสินค้า"]); 
    $stmt->execute(); 
    $row = $stmt->fetch(); 
?>
<html>
<head><meta charset="utf-8">
    <link rel="stylesheet" href="../style/styleadmin_editproduct1.css">
    <script>
            function gohome(){
                document.location="product_list_admin.php";
            }
        </script>
        <style>
            @media (min-width: 1101px){
                #editform{
                    margin:6.5% 35%;
                }
            }
            @media (min-width: 430px) and (max-width: 1100px) {
                #editform{
                    margin:8% 20%;
                }
            }
            @media (max-width: 430px) {
                #editform{
                    margin:20%;
                }
            }
    </style>
</head>
<body>
    <div id="editform">
    <header onclick="gohome()">GARBEL_BKK</header>
        <form action="updateproduct.php" method="post">
            <div id="input">
                รหัสสินค้า : <input type="text" name="รหัสสินค้า" value="<?=$row["รหัสสินค้า"]?>"><br>
                ชื่อสินค้า : <input type="text" name="ชื่อสินค้า" value="<?=$row["ชื่อสินค้า"]?>"><br> 
                ราคา : <input type="number" name="ราคา" value="<?=$row["ราคา"]?>"><br>
                สีสินค้า : <input type="text" name="สีสินค้า" value="<?=$row["สีสินค้า"]?>"><br> 
                ลายสินค้า : <input type="text" name="ลายสินค้า" value="<?=$row["ลายสินค้า"]?>"><br> 
                ขนาดสินค้า : <input type="text" name="ขนาดสินค้า" value="<?=$row["ขนาดสินค้า"]?>"><br> 
                จำนวนสินค้าคงเหลือ : <input type="text" name="จำนวนสินค้าคงเหลือ" value="<?=$row["จำนวนสินค้าคงเหลือ"]?>"><br> 
                รหัสแอดมิน : <input type="text" name="รหัสแอดมิน" value="<?=$row["รหัสแอดมิน"]?>"><br>
                <input type="hidden" name="img_pd" value="<?=$row["img_pd"]?>">
            </div>
            <input type="submit" value="EDIT" class="button">
        </form>
    </div>
</body>
</html>