<?php
    class Account {
        public $accountNo;   //Unique
        public $customerId;  //Foreign key customer table/model "id"
        public $balance;
        public $status;       //[Active/Inactive/Blocked]

        public function __construct(){}
    }

?>