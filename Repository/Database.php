<?php
    include_once './Shared/Utilities/Logger.php';
    include_once './Shared/Models/Account.php';
    include_once './Shared/Models/Customer.php';
    include_once './Shared/Models/Transaction.php';

    class Database {
        //Table Data
        public static $accounts = [];
        public static $transactions = [];
        public static $customers = [];
        public static $transactionTypes = ["deposit", "withdrawal", "transfer"];
        public static $statuses = ["active", "inactive", "blocked"];

        public function __construct() {}

        public static function loadData() {
            self::loadCustomers();
            self::loadTransactions();
            self::loadAccounts();
        }

        public static function loadAccounts() {
            //Load 5 accounts
            for($i=0; $i<5; $i++) {
                $account = new Account();
                $account->accountNo = $i;
                $account->customerId = $i;
                $account->balance = 0;
                $account->status = self::$statuses[0];
                self::$accounts[] = $account;
            }
            Logger::log("****************************************      Accounts loaded successfully     *************************************<br/>");
        }

        public static function loadTransactions() {
            //Load 5 transactions
            for($i=0; $i<5; $i++) {
                $transaction = new Transaction();
                $transaction->id = ($i);
                $transaction->amount = (rand(0, 10000));
                $transaction->type = (self::$transactionTypes[rand() % 3]);
                $transaction->comment = self::generateRandomComment();
                $transaction->dueDate = date("d.m", time() + rand()) . ".2022";
                self::$transactions[] = $transaction;
            }
            Logger::log("****************************************      Transactions loaded successfully     *************************************<br/>");
        }

        public static function loadCustomers() {
            //Load 5 customers
            for($i=0; $i<5; $i++) {
                $customer = new Customer();
                $customer->id = ($i);
                $customer->name = ("Customer" . $i);
                $customer->email = ("customer" . $i . "@email.com");
                self::$customers[] = $customer;
            }
            Logger::log("****************************************      Customers loaded successfully     *************************************<br/>");
        }

        private static function generateRandomComment() {
            $alphabets = range ("a", "z");
            shuffle ($alphabets);
            return substr(implode ("", $alphabets), 3, 17);
        }
    }
?>