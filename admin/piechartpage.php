<?php include "../connect.php" ?>
<?php
    session_start();

    if(empty($_SESSION['ausername'])){
        header("location:login.php");
    }
?>
<?php
    $stmt = $pdo->prepare("SELECT `สินค้า`.`รหัสสินค้า` AS pid,`สินค้า`.`ชื่อสินค้า` AS pname,
                            SUM(`คำสั่งซื้อ`.`จำนวนสินค้า`) AS sum FROM `คำสั่งซื้อ` 
                            RIGHT JOIN `สินค้า` ON `สินค้า`.`รหัสสินค้า`=`คำสั่งซื้อ`.`รหัสสินค้า` 
                            GROUP BY `คำสั่งซื้อ`.`รหัสสินค้า` ORDER BY sum DESC");
    $stmt->execute();
    echo "<script>var arry = [['Pname', 'Psum']];</script>";
    while($row=$stmt->fetch()){
        if($row["sum"]==NULL){
            $arry = array("pname"=>$row["pname"],"sum"=>$row["sum"]);
            $json_data = json_encode($arry,JSON_UNESCAPED_UNICODE);
            echo "<script>console.log(".$json_data.");</script>";
            echo "<script>var rawData=".$json_data.";</script>";
            echo "<script>var content=[];</script>";
            echo "<script>content.push(rawData.pname,0);</script>";
            echo "<script>console.log(content);</script>";
            echo "<script>arry.push(content)</script>";
        }
        else{
            $arry = array("pname"=>$row["pname"],"sum"=>$row["sum"]);
            $json_data = json_encode($arry,JSON_UNESCAPED_UNICODE);
            echo "<script>console.log(".$json_data.");</script>";
            echo "<script>var rawData=".$json_data.";</script>";
            echo "<script>console.log(rawData);</script>";
            echo "<script>var content=[];</script>";
            echo "<script>console.log(Number.parseInt(rawData.sum));</script>";
            echo "<script>content.push(rawData.pname,Number.parseInt(rawData.sum));</script>";
            echo "<script>console.log(content);</script>";
            echo "<script>arry.push(content)</script>";
        }
    }
    echo "<script>console.log(arry)</script>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable(arry);
                var options = {
                 title: 'ยอดขาย',
                 is3D: true,
                 };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                //console.log(data);
                chart.draw(data, options);

            }
        </script>
         <style>
            @media (min-width: 1101px){
                #piechart{
                    margin: 50px 0px 0px 350px;

                }
            }
            @media (min-width: 430px) and (max-width: 1100px) {
                #piechart{
                    margin: 0px 0px 0px -140px;
                }
            }
            @media (max-width: 430px) {
                #piechart{
                    margin: 0px 0px 0px -160px;
                   
            }
        }
    </style>
    </head>
    <link rel="stylesheet" href="../style/piechartpage.css">
    <body>
        <header>GARBEL_BKK
            <nav>
                <a href="product_list_admin.php">HOME</a>
                <a href="show_circulation.php">Circulation</a>
            </nav>
        </header>
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </body>
</html>