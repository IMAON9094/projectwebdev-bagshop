<?php header('Access-Control-Allow-Origin: *'); header('Content-Type: application/json');?>
<?php include "connectdbforjson.php";include "readDBforjson.php";?>
<?php
    $database = new mainDB();
    $db = $database->conndb();

    $product = new sendsqlDB($db);
    $stmt=$product->sqlproduct();
    //$num=$stmt->rowCount();
    $product_arry=array();
    while($row=$stmt->fetch()){
        $product_item= array(
            "pid"=>$row["รหัสสินค้า"],
            "pname"=>$row["ชื่อสินค้า"],
            "price"=>$row["ราคา"],
            "pcolor"=>$row["สีสินค้า"],
            "pstrip"=>$row["ลายสินค้า"],
            "psize"=>$row["ขนาดสินค้า"],
            "img_pd"=>$row["img_pd"]
        );
        array_push($product_arry,$product_item);
    }
    echo json_encode($product_arry,JSON_UNESCAPED_UNICODE);
?>