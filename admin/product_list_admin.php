<?php include "../connect.php" ?>
<?php
    session_start();

    if(empty($_SESSION['ausername'])){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
<script>
        function confirmDelete(รหัสสินค้า) { 
            var ans = confirm("ต้องการลบสินค้ารหัส " + รหัสสินค้า);
            if (ans==true) 
                document.location = "delete.php?รหัสสินค้า=" + รหัสสินค้า; 
        }
</script>
    <title>GARBEL_BKK</title>
    <link rel="stylesheet" href="../style/style_product_list_admin.css">
</head>
<body>
    <?php
        $stmt=$pdo->prepare("SELECT * FROM `สินค้า`");
        $stmt->execute();
    ?>
        
        <header>
        <div class="gar">GARBEL_BKK</div>
        <div class="u"><?=$_SESSION['ausername']?>
        <b><a href="statusselect.php">Status</a>
        <a href="show_circulation.php">Circulation</a>
        <a href="logout.php">Log out</a></b></div>
        </header>
        

    <div class="show-productcus">
        <?php while($row=$stmt->fetch()): ?>
            <div class="show-pdcus" id="productlist">
            <a href="productdetail_json.php?รหัสสินค้า=<?=$row["รหัสสินค้า"]?>" style="background-color:unset">
                <img src="../photo/product/<?=$row["img_pd"]?>" alt="<?=$row["img_pd"]?>" width="150"><br>
                <p><?=$row["ชื่อสินค้า"]?></p>
            </a>
                <p><?=$row["ราคา"]?></p>
                <g><a href='editform.php?รหัสสินค้า=<?=$row ["รหัสสินค้า"]?>'>แก้ไข</a> |
                <a href='#' onclick='confirmDelete("<?=$row ["รหัสสินค้า"]?>")'>ลบ</a></g>
            </div>
        <?php endwhile; ?>
        <div class="show-pdcus">
            <a class="link-update" href="addproduct.php" style="background-color:unset"><p class="slink-ud">+</p></a>
        </div> 
    </div>
</body>
</html>