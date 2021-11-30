<?php include "../connect.php" ?>
<!--product recommend2-->
<?php
    $osn=$_GET['osn'];
    //echo $osn;
    if($osn==0){
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
        

        //echo "<div class='show-product' id='divshowpd'>";

        while($rowht=$pdhot->fetch()){
            echo "<div class='show-pd'>";
                echo "<div class='ribbon'>RECOMMENDED</div>";
                    echo "<a class='show-pdlink' href='product-detail.php?รหัสสินค้า=".$rowht['รหัสสินค้า']."'>";
                        echo "<img src='../photo/product/".$rowht['img_pd']."' alt=".$rowht['img_pd']." width='250'><br>";
                        echo "<p>".$rowht["ชื่อสินค้า"]."</p>";
                        echo "<p>".$rowht["ราคา"]."</p>";
                    echo "</a>";
            echo "</div>";
        } 

            



            $stmt=$pdo->prepare("SELECT `รหัสสินค้า`,`ชื่อสินค้า`,`ราคา`,img_pd FROM `สินค้า` LIMIT 10");
            //$stmt->bindParam(1,$osn);
            $stmt->execute();
        while($row=$stmt->fetch()){
            echo "<div class='show-pd' id='showallpd'>";
                echo "<a class='show-pdlink' href='product-detail.php?รหัสสินค้า=".$row['รหัสสินค้า']."'>";
                    echo "<img src='../photo/product/".$row['img_pd']."' alt=".$row['img_pd']." width='250'><br>";
                    echo "<p>".$row["ชื่อสินค้า"]."</p>";
                    echo "<p>".$row["ราคา"]."</p>";
                echo "</a>";
            echo "</div>";
        } 
    }
    else{
        $stmt=$pdo->prepare("SELECT `รหัสสินค้า`,`ชื่อสินค้า`,`ราคา`,img_pd FROM `สินค้า` LIMIT 10 OFFSET ?");
        //echo "<script>console.log(offset num = ".$osn.")</script>";
        //echo "offset num = ".$osn+1;
        $stmt->bindParam(1,$osn,PDO::PARAM_INT);
        $stmt->execute();
        while($row=$stmt->fetch()){
            echo "<div class='show-pd' id='showallpd'>";
                echo "<a class='show-pdlink' href='product-detail.php?รหัสสินค้า=".$row['รหัสสินค้า']."'>";
                    echo "<img src='../photo/product/".$row['img_pd']."' alt=".$row['img_pd']." width='250'><br>";
                    echo "<p>".$row["ชื่อสินค้า"]."</p>";
                    echo "<p>".$row["ราคา"]."</p>";
                echo "</a>";
            echo "</div>";
        }
    }

?>


