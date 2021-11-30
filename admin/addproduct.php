<?php include "../connect.php" ?>
<?php
    session_start();

    if(empty($_SESSION['ausername'])){
        header("location:login.php");
    }
?>
<?php
        /////////insert into table//////////
        if(isset($_POST['submit'])){
            ///////move file///////////
            $img_pd=$_FILES["image"]["name"];
            $tmp_img=$_FILES["image"]["tmp_name"];
            move_uploaded_file($tmp_img, "../photo/product/$img_pd");

            ///////sql////////
            $stmt = $pdo->prepare("INSERT INTO `สินค้า` VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $_POST["รหัสสินค้า"]);
            $stmt->bindParam(2, $_POST["ชื่อสินค้า"]);
            $stmt->bindParam(3, $_POST["ราคา"]);
            $stmt->bindParam(4, $_POST["สีสินค้า"]);
            $stmt->bindParam(5, $_POST["ลายสินค้า"]); 
            $stmt->bindParam(6, $_POST["ขนาดสินค้า"]);
            $stmt->bindParam(7, $_POST["จำนวนสินค้าคงเหลือ"]);
            $stmt->bindParam(8, $_POST["admin_id"]);
            $stmt->bindParam(9, $img_pd); 
            if ($stmt->execute()) {
                echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
                header("location: product_list_admin.php");
            }
        } 
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GARBEL_BKK</title>
        <link rel="stylesheet" href="../style/styleaddproduct_ajax.css">
        <script>
            function gohome(){
                document.location="product_list_admin.php";
            }
            ///////รหัสสินค้า////////
            var http;
            function sendid(){
                http=new XMLHttpRequest();
                http.onreadystatechange=checkid;

                var pdid = document.getElementById('pdid').value;
                var url = "checkpdid.php?รหัสสินค้า="+pdid;

                http.open("GET",url);
                http.send();
            }
            function checkid(){
                if(http.readyState==4&&http.status==200){
                    if(http.responseText=='1'){
                        document.getElementById('pdid').className="denied";
                        document.getElementById('pdid').focus();
                    }
                    else if(http.responseText=='0'){
                        document.getElementById('pdid').className="approve";

                    }
                }
            }
        </script>
                <style>
            @media (min-width: 1101px){
                #form{
                    margin:6.5% 35%;
                }
            }
            @media (min-width: 430px) and (max-width: 1100px) {
                #form{
                    margin:8% 20%;
                }
            }
            @media (max-width: 430px) {
                #form{
                    margin:20%;
                }
            }
            #box{
                text-align:right;
                margin-right:10px;
            }
            #button{
                text-align:center;
            }
        </style>
    </head>
    <body>
        <?php
            $stmt=$pdo->prepare("SELECT `รหัสแอดมิน` FROM `แอดมิน`");
            $stmt->execute();
        ?>
       
        <div id=form>
            <form action="addproduct.php" method="POST" enctype="multipart/form-data">
            <label id=gar onclick="gohome()">GARBEL_BKK</label>
            <div id=box>
                <label>รหัสสินค้า</label>
                <input type="text" name="รหัสสินค้า" onblur="sendid()" id="pdid" pattern="[P]{1}[0-9]{3}" required><br>
                <label>ชื่อสินค้า</label>
                <input type="text" name="ชื่อสินค้า" required ><br>
                <label>ราคา</label>
                <input type="number" name="ราคา" required><br>
                <label>สีสินค้า</label>
                <input type="text" name="สีสินค้า" required><br>
                <label>ลายสินค้า</label>
                <input type="text" name="ลายสินค้า" required><br>
                <label>ขนาดสินค้า</label>
                <input type="text" name="ขนาดสินค้า" required><br>
                <label>จำนวนสินค้า</label>
                
                <input type="number" name="จำนวนสินค้าคงเหลือ" required><br>
                <label>รหัสแอดมินที่ดูแลสินค้า</label> 
    
                <select name="admin_id">
                    <?php while($row=$stmt->fetch()){?>
                    <option value="<?=$row['รหัสแอดมิน']?>"><?=$row['รหัสแอดมิน']?></option>
                    <?php } ?>
                </select><br>
                <input type="file" name="image" id="file" required><br>
                </div>
                <div id=button> <input type="submit" name="submit" id="submit" value="ADD">
            </div>
            </form>
        </div>  
    </body>
</html>