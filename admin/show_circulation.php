<?php include "../connect.php"?>
<?php
    session_start();

    if(empty($_SESSION['ausername'])){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style/style_show_circulation.css">

        <title>GARBEL_BKK</title>
        <script>
            var aj;
            function sqlpick(){
                var sqlpick = document.getElementById('sqlpick');
                //console.log(sqlpick.value);
                aj = new XMLHttpRequest();
                aj.onreadystatechange = showresult;
                var url="show_circulation_ajax.php?opt="+sqlpick.value;
                aj.open("GET",url);
                aj.send();
            }
            function showresult(){
                var article = document.getElementById('article');
                if(aj.readyState==4&&aj.status==200){
                    article.innerHTML = aj.responseText;
                }
            }
        </script>
    </head>
    <body>
        <header>GARBEL_BKK
            <nav>
                <a href="product_list_admin.php">HOME</a>
                <a href="piechartpage.php">ยอดขาย</a>
            </nav>
        </header>
        <section>
            <nav>
                <select name="sqlpick" id="sqlpick" onchange="sqlpick()">
                    <option value="sql1">จำนวนสินค้าที่ถูกสั่งซื้อแต่ละอย่าง</option>
                    <option value="sql2">จำนวนครั้งในการสั่งของแต่ละชิ้นและจำนวนชิ้นที่สั่งของชิ้นนั้นของลูกค้า</option>
                    <option value="sql3" selected>-------</option>
                </select>
            </nav>
            <article id="article">
            </article>
        </section>
    </body>
</html>