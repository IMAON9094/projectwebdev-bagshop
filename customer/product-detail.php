<?php include "../connect.php" ?>

<?php
    session_start();

    if(empty($_SESSION['username'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <link rel="stylesheet" href="../style/styleproductdetail1.css">
        <title>GARBEL_BKK</title>
        <style>
          
          @media (min-width: 1101px){
            .all-detail {  
                padding: 50px;
                margin:60px;
                margin-left:220px;
            }
            .pd-detail {
                padding: 15px;            
                margin-left:420px;
                margin-top:-305px;
            }
            }
            @media (min-width: 430px) and (max-width: 1100px) {
            .all-detail {  
                padding: 10px;
                margin:5px;
                margin-left:50px;
            }
            .pd-detail {
                padding: 10px;            
                margin-left:200px;
                margin-top:5px;
                margin-left:-15px;
            }
            }
            @media (max-width: 429px) {
            header{
                padding: 10px;
                font-size: 15px;
            }           
            .all-detail {  
                padding: 2px;
                margin:10px;
                margin-left:100px;
            }
            .pd-detail {
                padding: 5px;
                margin-top:5px;
                font-size: 1px;
                margin-left: -80px;
                width: 300px;
            }
            img{
                width:150px;
                height:150px;
            }   
            }
        
        </style>
        <script>
            function gohome(){
                document.location="product-list.php";
            }
        </script>
    </head>
    <body>
        <header onclick="gohome()">GARBEL_BKK</header>
        <?php
            $stmt=$pdo->prepare("SELECT * FROM `สินค้า` WHERE `รหัสสินค้า`=?");
            $stmt->bindParam(1,$_GET["รหัสสินค้า"]);
            $stmt->execute();
            $row=$stmt->fetch();
        ?>
        <div class="all-detail">
            <div>
            <img src="../photo/product/<?=$row["img_pd"]?>" alt="<?=$row["img_pd"]?>" width="350">
            </div>
            <article class="pd-detail">
                <h1><?=$row["ชื่อสินค้า"]?></h1>
                <h2><?=$row["ราคา"]?></h2>
                <p>color: <?=$row["สีสินค้า"]?></p>
                <p>striped: <?=$row["ลายสินค้า"]?></p>
                <p>size: <?=$row["ขนาดสินค้า"]?></p>
                <form action="cart.php?action=add&pid=<?=$row["รหัสสินค้า"]?>" method="post">
                <input type="number" name="quantity" value="1" min="1" max="<?=$row["จำนวนสินค้าคงเหลือ"]?>">
                    <input type="submit" value="Add to cart"  id="add">
                </form>
            </article>
        </div>
    </body>
</html>