<?php
    include_once './Repository/Database.php';

    class DTransactions {
        public function __construct(){}

        public function getAllTransactionsByComments() { 
            $transactions = Database::$transactions;
            usort($transactions,function($a, $b) {
                return strcmp($a->comment, $b->comment);
            });
        }

        public function getAllTransactionsByDueDate() { 
            $transactions = Database::$transactions;
            usort($transactions,function($a, $b) {
                return strcmp(strtotime($a->dueDate), strtotime($b->dueDate));
            });
        }

        public function addTransactionToLedger($transaction) {
            Database::$transactions[] = $transaction;
        }
    }
?>