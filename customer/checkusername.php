<?php include "../connect.php"?>
<?php
    $username = $_GET['username'];
    $chuser = $pdo->prepare("SELECT username FROM userpasscus WHERE username=?");
    $chuser->bindParam(1,$username);
    $chuser->execute();
    $row=$chuser->fetch();
    if(!empty($row)){
        echo "1";
    }
    else{
        echo "0";
    }
?>