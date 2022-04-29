<?php
    include_once './Shared/Utilities/Logger.php';
    include_once './Repository/Database.php';

    class DAccounts {
        public function __construct(){}

        public function getAllAccounts() { 
            return Database::$accounts;
        }

        public function getBalanceByAccount($accountNo) {
            return $this->getAccountByNo($accountNo)->balance;
        }

        public function getAccountByNo($accountNo) {
            $accounts = Database::$accounts;
            $searchIndex = array_search($accountNo, array_column($accounts, 'accountNo'));
            return $accounts[$searchIndex];
        }

        public function depositAmount($transaction) {
            $this->getAccountByNo($transaction->sourceAccount)->balance += $transaction->amount;
            Logger::log("Amount deposited to Account# {$transaction->sourceAccount}, new balance is " . $this->getAccountByNo($transaction->sourceAccount)->balance);
        }

        public function transferAmount($transaction) {
            $this->getAccountByNo($transaction->sourceAccount)->balance -= $transaction->amount;
            $this->getAccountByNo($transaction->destinationAccount)->balance += $transaction->amount;
            Logger::log("Amount transfered from Account# {$transaction->sourceAccount} to Account# {$transaction->destinationAccount}, remaining balance is " . $this->getAccountByNo($transaction->sourceAccount)->balance);
        }

        public function withDrawAmount($transaction) {
            $this->getAccountByNo($transaction->sourceAccount)->balance -= $transaction->amount;
            Logger::log("Amount withdrawn from Account# {$transaction->sourceAccount}, remaining balance is " . $this->getAccountByNo($transaction->sourceAccount)->balance);   
        }

    }
?>