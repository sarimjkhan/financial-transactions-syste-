<?php
    include_once 'DAL/DAccounts.php';
    class BAccounts {
        public function __construct(){}
        
        public function getAllAccounts() { 
            $accountsDAL = new DAccounts();
            return $accountsDAL->getAllAccounts();
        }

        public function getBalanceByAccount($accountNo) {
            $accountsDAL = new DAccounts();
            return $accountsDAL->getBalanceByAccount($accountNo);
        }
    }
?>