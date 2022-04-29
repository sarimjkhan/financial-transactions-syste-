<?php
    include_once 'DAL/DTransactions.php';
    include_once 'DAL/DAccounts.php';
    include_once 'DAL/DTransactionTypes.php';
    include_once 'Shared/Models/Transaction.php';

    class BTransactions {
        public function __construct(){}

        public function getAllTransactionsByComments() { 
            $transactionsDAL = new DTransactions();
            return $transactionsDAL->getAllTransactionsByComments();
        }

        public function getAllTransactionsByDueDate() { 
            $transactionsDAL = new DTransactions();
            return $transactionsDAL->getAllTransactionsByDueDate();
        }

        public function performOperation($amount, $comment, $type, $sourceAccount, $destinationAccount = null) {
            $transaction = new Transaction();
            $transaction->amount = $amount;
            $transaction->comment = $comment;
            $transaction->dueDate = date('d.m') . '2022';
            $transaction->type = $type;
            $transaction->sourceAccount = $sourceAccount;
            $transaction->destinationAccount = $destinationAccount;

            $transactionsDAL = new DTransactions();
            $transactionsDAL->addTransactionToLedger($transaction);

            $this->updateAccountBalance($transaction);
        }

        private function updateAccountBalance($transaction) {
            $accountsDAL = new DAccounts();
            $transactionTypesDAL = new DTransactionTypes();
            $transactionTypes = $transactionTypesDAL->getAllTransactionTypes();

            if($transaction->type === $transactionTypes[0]) { //deposit
                $accountsDAL->depositAmount($transaction);
            } else if ($transaction->type === $transactionTypes[1]) { //withdrawal
                $accountsDAL->withDrawAmount($transaction);
            } else if ($transaction->type === $transactionTypes[2]) { //transfer
                $accountsDAL->transferAmount($transaction);
            }
        }

    }
?>