<?php
    include_once './Repository/Database.php';
    class DCustomers {
        public function __construct(){}

        public function getAllCustomers() { 
            return Database::$customers;
        }
    }
?>