<?php
    include_once 'BLL/BAccounts.php';
    include_once 'BLL/BTransactions.php';
    include_once 'Repository/Database.php';

    class Client {
        public static function main() {
            //First load all the data od accounts, customers and transactions
            Database::loadData();

            Logger::log("<br/><br/>****************************************      ledger Data     *************************************<br/>");
            Logger::log("<strong>Transactions:</strong>");
            Logger::log(Database::$transactions);
            Logger::log( "<strong>Accounts:</strong>");
            Logger::log(Database::$accounts);
            Logger::log( "****************************************      ledger Data     *************************************<br/><br/><br/>");

            self::executeOperations();
        }

        public static function executeOperations() {
            $accountsBLL = new BAccounts();
            $transactionsBLL = new BTransactions();

            // 1) get all accounts in the system.
            $accountsBLL->getAllAccounts();

            // 2) get the balance of a specific account
            $accountsBLL->getBalanceByAccount(2);

            Logger::log("****************************************      Performing Operations     *************************************<br/>");
            // 3) perform an operation
            $transactionsBLL->performOperation(50, "Transferring 50AED to AccountNo: 1", "transfer", 1, 2);
            $transactionsBLL->performOperation(20, "Deposit 20AED to Account # 3", "deposit", 3);
            $transactionsBLL->performOperation(150, "Withdraw 150AED from AccountNo: 4", "withdrawal", 1, 2);
            Logger::log("****************************************      Performing Operations     *************************************<br/><br/><br/>");

            // 4) get all account transactions sorted by comment in alphabetical order.
            $transactionsBLL->getAllTransactionsByComments();

            // 5) get all account transactions sorted by date
            $transactionsBLL->getAllTransactionsByDueDate();

            Logger::log("****************************************      Updated ledger Data     *************************************<br/>");
            Logger::log( "<strong>Transactions:</strong>");
            Logger::log(Database::$transactions);
            Logger::log("<strong>Accounts:</strong>");
            Logger::log(Database::$accounts);
            Logger::log("****************************************      Updated ledger Data     *************************************");
        }
    }
?>