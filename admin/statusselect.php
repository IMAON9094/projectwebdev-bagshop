<?php include "../connect.php" ?>
<?php
    session_start();

    if(empty($_SESSION['ausername'])){
        header("location:login.php");
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/style_statusselect_admin.css">

    <title>GARBEL_BKK</title>
    <script>
        function statussl(){
            var id = document.getElementById("selectid");
            var idp = document.getElementById("selectp");
            document.location="statusselect.php?รหัสสถานะ="+id.value;
        }
    </script>
</head>
 <body>
<header>GARBEL_BKK
<div class="home"><a href="product_list_admin.php">HOME</a></div>
</header>
<?php 
    $status=$pdo->prepare("SELECT * FROM `สถานะสินค้า`");
    $status->execute();
?>
<?php 
    $stmt=$pdo->prepare("SELECT * FROM `สถานะสินค้า`");
    $stmt->execute();
?>
        <div id="select">
            <select name="selectst" onchange="statussl()" id="selectid">
                <option value="start">----------</option>
                <?php while($row=$stmt->fetch()): ?>
                <option value="<?=$row["รหัสสถานะ"]?>"><?=$row["สถานะของสินค้า"]?></option>
                <?php endwhile; ?>
            </select>
        </div><br>

<?php
    if(!empty($_GET)){
        $stmt = $pdo->prepare("SELECT * FROM `สินค้า` 
                            INNER JOIN `คำสั่งซื้อ` ON `สินค้า`.`รหัสสินค้า` = `คำสั่งซื้อ`.`รหัสสินค้า` 
                            INNER JOIN `ลูกค้า` ON `คำสั่งซื้อ`.`รหัสลูกค้า` = `ลูกค้า`.`รหัสลูกค้า` 
                            WHERE `รหัสสถานะ` = ?");
        $stmt->bindParam(1, $_GET["รหัสสถานะ"]); 
        $stmt->execute();
    
        //////status///////
        $st=$pdo->prepare("SELECT `สถานะของสินค้า` FROM `สถานะสินค้า` WHERE `รหัสสถานะ` LIKE ?");
        $st->bindParam(1,$_GET["รหัสสถานะ"]);
        $st->execute();
        $stmean=$st->fetch();

       
        echo '<p id="selectp">สถานะ : '.$stmean['สถานะของสินค้า'].'</p>';
        echo '<table border="1">';
        echo '<th>ชื่อสินค้า</th>
            <th>ชื่อ-นามสกุล</th>
            <th>ที่อยู่</th>
            <th>จำนวนสินค้า</th>
            <th>slip</th>
            <th>edit</th>';
            while ($row = $stmt->fetch()) {
                echo '<tr>';
                    echo '<td>';
                        echo $row ["ชื่อสินค้า"] . "<br>";
                    echo '</td>';
                    echo '<td>';
                        echo $row ["ชื่อ-นามสกุล"] . "<br>";
                    echo '</td>';
                    echo '<td>';
                        echo $row ["ที่อยู่"] . "<br>";
                    echo '</td>';
                    echo '<td>';
                        echo $row ["จำนวนสินค้า"] . "<br>";
                    echo '</td>';
                    echo '<td>';
                        echo "<img src='../photo/slip/".$row['slip_img']."' width='100' alt='".$row['slip_img']."'> <br>";
                    echo '</td>';
                    //////?>
                    <td><div class="edit">
                    <a href='editstatus.php?pid=<?=$row["รหัสสินค้า"]?>&cid=<?=$row["รหัสลูกค้า"]?>&dt=<?=$row["วันที่สั่งสินค้า"]?>&tm=<?=$row["เวลาที่สั่งสินค้า"]?>'>edit</a>
            </div></td>
            <?php    //////
                echo '</tr>';
            }
        echo '</table>';
        
    }
?>
</body>
</html>