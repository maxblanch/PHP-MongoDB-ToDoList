<?php
    class SigninModel {

        public $user = null;

        public function __construct() {}

        public function getUser() {
            return $this->user;
        }

        public function setUser($data) {
            $this->user = $data;
        }

    }