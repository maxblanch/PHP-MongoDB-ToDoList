<?php
    class SignupView {

        private $model;

        public function __construct($model) {
            $this->model = $model;
        }

        public function renderSignupForm($errors) {
            require('views/layouts/signup_form.php');
        }
        
        public function renderRegistered() {
            $data = $this->model->getUser();
            require('views/layouts/registered.php');
        }
    }