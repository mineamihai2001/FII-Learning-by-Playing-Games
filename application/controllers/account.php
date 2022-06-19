<?php
    class Account extends BaseController {
        private AccountModel $accountModel;
        private $user_id;

        public function __construct()
        {
            parent::__construct();
            $this->accountModel = new AccountModel();
            $this->user_id = $_SESSION['user_id'];
        }

        public function account_details() {
            $progress = $this->accountModel->get_progress($this->user_id);
            $this->send_output($progress, $this->headers['success']);
        }

        public function leaderboards() {
            $data = $this->accountModel->get_leaderboards();
            $this->send_output($data, $this->headers['success']);
        }
    }