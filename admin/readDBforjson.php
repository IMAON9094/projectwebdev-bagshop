<?php
    class sendsqlDB{

        private $pdo;
        private $table_name = "product";
        public function __construct($db){
            $this->pdo = $db;
        }
        function sqlproduct(){
            $stmt=$this->pdo->prepare("SELECT * FROM `สินค้า`");
            $stmt->execute();
            return $stmt;
        }
    }
?>