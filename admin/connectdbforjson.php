<?php
    class mainDB{
        public function conndb(){
            $pdo = new PDO("mysql:host=localhost;dbname=projectweb;charset=utf8","root","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    }
?>