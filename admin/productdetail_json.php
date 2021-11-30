<?php
    session_start();

    if(empty($_SESSION['ausername'])){
        header("location:login.php");
    }
?>
<html>
    <head>
        <?php
            $pid_get = $_GET['รหัสสินค้า'];
            echo "<script>let gpid='$pid_get'</script>";
            
        ?>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style/style_productdetail_admin1.css">
        
        <script>
            function confirmDelete(รหัสสินค้า) { 
                var ans = confirm("ต้องการลบสินค้ารหัส " + รหัสสินค้า);
                if (ans==true) 
                    document.location = "delete.php?รหัสสินค้า=" + รหัสสินค้า; 
            }

            function gohome(){
                document.location="product_list_admin.php";
            }

            async function getDataFromDB(){
                let response = await fetch('http://localhost/projectweb/admin/readjson.php');
                let rawData = await response.text();
                let objectData = JSON.parse(rawData);
                let result = document.getElementById('result');
                let resultimg = document.getElementById('resultimg');
                let divlink = document.getElementById('button');

                for(let i=0;i<objectData.length;i++){
                    if(objectData[i].pid==gpid){
                        let img = document.createElement('img');
                        img.src="../photo/product/"+objectData[i].img_pd;
                        img.width="350";
                        resultimg.appendChild(img);
                        let h1 = document.createElement('H1');
                        let h2 = document.createElement('H2');
                        let p1 = document.createElement('p');
                        let p2 = document.createElement('p');
                        let p3 = document.createElement('p');
                        h1.innerHTML=objectData[i].pname;
                        h2.innerHTML=objectData[i].price;
                        p1.innerHTML=objectData[i].pcolor;
                        p2.innerHTML=objectData[i].pstrip;
                        p3.innerHTML=objectData[i].psize;
                        result.appendChild(h1);
                        result.appendChild(h2);
                        result.appendChild(p1);
                        result.appendChild(p2);
                        result.appendChild(p3);
                    }
                }
            }
            getDataFromDB();
        </script>
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
                #button{
                    margin-left:440px;
                    margin-top:-75px;
                    margin-bottom: 20px;  
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
                #button{
                    margin-left:5px;
                    margin-top:-70px;
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
                    padding: 15px 20px 0px;
                    margin-top:10px;
                    font-size: 12px;
                    margin-left: -50px;
                    width: 250px;
                }
                #button{
                    margin-left:40px;
                    margin-top:-98px;
                }
                img{
                    width: 200px;
                    height: 200px;
                }   
            }
        
        </style>
    </head>
    <body>
        <header onclick="gohome()">GARBEL_BKK</header>
        <div class="all-detail">
            <div id="resultimg">
            </div>
            <div>
            <article class="pd-detail" id="result">
            </article>
            <div id="button">
                <a href='editform.php?รหัสสินค้า=<?=$pid_get?>'>แก้ไข</a> 
                <a href='#' onclick='confirmDelete("<?=$pid_get?>")'>ลบ</a>
            </div>
        </div>
    </body>
</html>