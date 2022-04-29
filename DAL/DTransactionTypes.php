<?php
    include_once './Repository/Database.php';

    class DTransactionTypes {
        public function __construct(){}

        public function getAllTransactionTypes() { 
            return Database::$transactionTypes;
        }
    }
?>