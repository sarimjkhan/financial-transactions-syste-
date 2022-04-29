<?php
    include_once 'DAL/DCustomers.php';
    class BCustomers {
        public function __construct(){}

        public function getAllCustomers() { 
            $customersDAL = new DCustomers();
            return $customersDAL->getAllCustomers();
        }
    }
?>