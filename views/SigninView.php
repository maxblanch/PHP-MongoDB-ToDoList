<?php
    class SigninView {

        public function __construct() {

        }

        public function renderSigninForm($data) {
            require_once('views/layouts/signin_form.php');
        }
    }