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
    <link rel="stylesheet" href="../style/style_product_list_customer.css">
        <title>GARBEL_BKK</title>
        <style>
            .ribbon {
                    font: bold 16px sans-serif;
                    color: #333;
                    text-align: center;
                    -webkit-transform: rotate(-10deg);
                    -moz-transform:    rotate(-45deg);
                    -ms-transform:     rotate(-45deg);
                    -o-transform:      rotate(-45deg);
                    position: relative;
                    padding: 7px 0;
                    top: -15px;
                    left: -40px;
                    width: 150px;
                    background-color: #ebb134;
                    color: brown;
                    margin-bottom: -32px;
                    margin-left: 5px;
            }
            .footpd-list{
                    text-align: center;
                    background-color: #ddd;
                    margin-left: 50%;
                    padding: 10px;
                    width: max-content;
            }
            .pagination {
                    display: inline-block;
            }

            .pagination a {
                    color: black;
                    float: left;
                    padding: 8px 16px;
                    text-decoration: none;
                    transition: background-color .3s;
            }

            .pagination a:hover:not(.active) {
                    border-radius: 5px;
                    background-color: #930a00;
            }

        </style>
        <script>
            var aj;
            function showpdlimit($offsetnum){
                var divshowpd = document.getElementById('divshowpd');
                //console.log("osn="+$offsetnum);
                aj = new XMLHttpRequest();
                aj.onreadystatechange = showresult;
                var url="product-list-page.php?osn="+$offsetnum;
                aj.open("GET",url);
                aj.send();
            }
            function showresult(){
                var divshowpd = document.getElementById('divshowpd');
                if(aj.readyState==4&&aj.status==200){
                    divshowpd.innerHTML = aj.responseText;
                }
            }
        </script>
    </head>
    <body>
        <header>
        <div class="gar">GARBEL_BKK</div>
         <!--search-->
        <div class="search">
        <form action="searchpd.php">
            <input type="text" name="keyword">
            <input type="submit" value="search">
        </form></div>
        
        <div class="u">
        <?=$_SESSION["username"]?>
        <b><a href="cart.php?action=show">cart</a>
        <a href="logout.php">log out</a></b></div>
        </header>
        

        <!--product recommend1-->
        <?php
            $pdhot=$pdo->prepare("SELECT * FROM `สินค้า`
                                WHERE `สินค้า`.`รหัสสินค้า` IN (
                                SELECT `คำสั่งซื้อ`.`รหัสสินค้า` FROM `คำสั่งซื้อ`
                                GROUP BY  `คำสั่งซื้อ`.`รหัสสินค้า`
                                HAVING SUM(`คำสั่งซื้อ`.`จำนวนสินค้า`)  IN (
                                    SELECT MAX(sq1.sum) FROM `คำสั่งซื้อ`,(
                                    SELECT SUM(`คำสั่งซื้อ`.`จำนวนสินค้า`) AS sum,`คำสั่งซื้อ`.`รหัสสินค้า` FROM `คำสั่งซื้อ` 
                                    GROUP BY `รหัสสินค้า`) sq1
                                    WHERE sq1.`รหัสสินค้า`=`คำสั่งซื้อ`.`รหัสสินค้า`))");
            $pdhot->execute();
        ?>
        
        <!--------------------->

        <!--product list-->
        <div class="show-product" id="divshowpd">

        <!--product recommend2-->
        <?php while($rowht=$pdhot->fetch()){ ?>
        <!--ใช้<div class="show-pd">ใช้แทนdivบรรทัดต่อไปได้แต่มันจะเหมือนสินค้าปกติอันอื่นๆข้างล่าง-->
        <div class="show-pd">
            <div class="ribbon">RECOMMENDED</div>
                <a class="show-pdlink" href="product-detail.php?รหัสสินค้า=<?=$rowht['รหัสสินค้า']?>">
                    <img src="../photo/product/<?=$rowht["img_pd"]?>" alt="<?=$rowht["img_pd"]?>" width="250"><br>
                    <p><?=$rowht["ชื่อสินค้า"]?></p>
                    <p><?=$rowht["ราคา"]?></p>
                </a>
            </div>
            <?php
            } 
            ?>
        <!--------------------->

        <!--สินค้า-->
        <!--sql-->
        <?php
            $stmt=$pdo->prepare("SELECT `รหัสสินค้า`,`ชื่อสินค้า`,`ราคา`,img_pd FROM `สินค้า` LIMIT 10");
            $stmt->execute();
        ?>
        <!--end sql-->
        <?php while($row=$stmt->fetch()){ ?>
            <div class="show-pd" id="showallpd">
                <a class="show-pdlink" href="product-detail.php?รหัสสินค้า=<?=$row['รหัสสินค้า']?>">
                    <img src="../photo/product/<?=$row["img_pd"]?>" alt="<?=$row["img_pd"]?>" width="250"><br>
                    <p><?=$row["ชื่อสินค้า"]?></p>
                    <p><?=$row["ราคา"]?></p>
                </a>
            </div>
        <?php
        } 
        ?>
        <!--------------------->
        </div>
        <footer class="footpd-list">
            <?php
                $cntrec=$pdo->prepare("SELECT COUNT(*) AS count FROM `สินค้า`");
                $cntrec->execute();
                $row=$cntrec->fetch();
                $countRec=$row["count"];
                //จำนวนหน้าต่อเพจ $Records_Per_page
                $Records_Per_page= 10;
                //จำนวนหน้าทั้งหมด $num_page
                $num_page=ceil($countRec/$Records_Per_page);
                //echo $num_page;
                ?>
                    <div class="pagination">
                        <!--<a href="#">&laquo;</a>-->
                <?php for($i=1;$i<=$num_page;$i++){
                    $offsetnumber=($i-1)*$Records_Per_page;
                    ?>
                        <a href="#" onclick="showpdlimit(<?=$offsetnumber?>)"><?=$i?></a>
                <?php } ?>
                        <!--<a href="#">&raquo;</a>-->
                    </div>
        </footer>
    </body>
</html>