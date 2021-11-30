<?php include "../connect.php"?>
<?php
    $sqlpick=$_GET['opt'];
    if($sqlpick==='sql1'){
        $stmt = $pdo->prepare("SELECT `สินค้า`.`รหัสสินค้า` AS pid,`สินค้า`.`img_pd` AS img_pd,`สินค้า`.`ชื่อสินค้า` AS pname,SUM(`คำสั่งซื้อ`.`จำนวนสินค้า`) AS sum FROM `คำสั่งซื้อ` 
                                RIGHT JOIN `สินค้า` ON `สินค้า`.`รหัสสินค้า`=`คำสั่งซื้อ`.`รหัสสินค้า` 
                                GROUP BY `คำสั่งซื้อ`.`รหัสสินค้า` ORDER BY sum DESC");
        $stmt->execute();
        echo "<table>";
            echo "<tr>
                <th>รูปสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวนสินค้าที่ถูกสั่งทั้งหมด</th>
                </tr>";
            while($row=$stmt->fetch()){
                if($row['sum']==NULL){
                    echo "<tr>";
                        echo "<td><img src='../photo/product/".$row['img_pd']."' width='100'></td>";
                        echo "<td>".$row['pname']."</td>";
                        echo "<td>0</td>";
                    echo "</tr>";
                }
                else{
                    echo "<tr>";
                        echo "<td><img src='../photo/product/".$row['img_pd']."' width='100'></td>";
                        echo "<td>".$row['pname']."</td>";
                        echo "<td>".$row['sum']."</td>";
                    echo "</tr>";
                }
            }
        echo "</table>";
    }
    else if($sqlpick==='sql2'){
        $stmt2 = $pdo->prepare("SELECT img_pd,`ชื่อสินค้า`,`ชื่อ-นามสกุล`,COUNT(`คำสั่งซื้อ`.`รหัสสินค้า`) AS count,
                                SUM(`คำสั่งซื้อ`.`จำนวนสินค้า`) AS sum FROM `คำสั่งซื้อ`
                                JOIN `สินค้า` ON `สินค้า`.`รหัสสินค้า`=`คำสั่งซื้อ`.`รหัสสินค้า`,
                                    (SELECT `รหัสลูกค้า`,`ชื่อ-นามสกุล` FROM `ลูกค้า`) subquery1
                                    WHERE subquery1.`รหัสลูกค้า`=`คำสั่งซื้อ`.`รหัสลูกค้า`
                                    GROUP BY `คำสั่งซื้อ`.`รหัสสินค้า`,`คำสั่งซื้อ`.`รหัสลูกค้า`;");
        $stmt2->execute();
        echo "<table>";
            echo "<th>รูปสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ชื่อ-นามสกุล</th>
                <th>จำนวนครั้งที่สั่ง</th>
                <th>จำนวนสินค้าที่สั่ง</th>";
            while($row2=$stmt2->fetch()){
                echo "<tr>";
                    echo "<td><img src='../photo/product/".$row2['img_pd']."' width='100'></td>";
                    echo "<td>".$row2['ชื่อสินค้า']."</td>";
                    echo "<td>".$row2['ชื่อ-นามสกุล']."</td>";
                    echo "<td>".$row2['count']."</td>";
                    echo "<td>".$row2['sum']."</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
    else if($sqlpick==='sql3'){
        //echo "<p>NO CHOOSE</p>";
    }
?>