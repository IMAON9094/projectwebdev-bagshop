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
        <link rel="stylesheet" href="../style/stylesearch1.css">
        <title>GARBEL_BKK</title>
    </head>
    <body>
    
    <header>GARBEL_BKK
        <div class="abc"><button onclick="document.location='product-list.php'">back</button>
        <b><a href="product-list.php" id="pay">HOME</a>
        <a href="logout.php" id="pay">log out</a></b></div>
        </header>
    

   
    <p id="result">result: </p>
    <?php 
            $srch=$pdo->prepare("SELECT `รหัสสินค้า`,`ชื่อสินค้า`,`ราคา`,img_pd FROM `สินค้า` WHERE `ชื่อสินค้า` LIKE ?");
            if(!empty($_GET)){
                $value='%'.$_GET['keyword'].'%';
            }
            $srch->bindParam(1,$value);
            $srch->execute();
            $srchct=$pdo->prepare("SELECT COUNT(*) FROM `สินค้า` WHERE `ชื่อสินค้า` LIKE ?");
            if(!empty($_GET)){
                $value1='%'.$_GET['keyword'].'%';
            }
            $srchct->bindParam(1,$value1);
            $srchct->execute();
            $row=$srchct->fetch();
            if($row['COUNT(*)']!=0){
        ?>
        <div class="show-product">
        <?php while($row=$srch->fetch()){ ?>
            <div class="show-pd" id="showsearch">
                <a class="show-pdlink" href="product-detail.php?รหัสสินค้า=<?=$row['รหัสสินค้า']?>">
                    <img src="../photo/product/<?=$row["img_pd"]?>" alt="<?=$row["img_pd"]?>" width="250"><br>
                    <p><?=$row["ชื่อสินค้า"]?></p>
                    <p><?=$row["ราคา"]?></p>
                </a>
            </div>
        <?php
        } 
        ?>
        </div>
        <?php
        }
        else{ ?>
            <p id="result">no result</p>
        <?php
        }
        ?>
    </body>
</html>