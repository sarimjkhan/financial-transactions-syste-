<?php
    class Transaction {
        public $id;   //Unique
        public $type;  // ['deposit', 'withdrawal', 'transfer']
        public $amount;
        public $comment;
        public $dueDate;
        public $sourceAccount;
        public $destinationAccount = null;

        public function __construct(){}
    }

?>