<?php
    include_once "DAL/DTransactionTypes.php";
    include_once 'Repository/Database.php';

    class BTransactionTypess {
        public function __construct(){}

        public function getAllTransactionTypes() { 
            $transactionTypesDAL = new DTransactionTypes();
            return $transactionTypesDAL->getAllTransactionTypes();
        }
    }
?>