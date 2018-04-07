<?php
    class SignupModel {
        
        public $user;

        public function __construct(){}

        //Setter
        public function setUser($value) {
            $this->user = $value;
        }

        //Getter
        public function getUser() {
            return $this->user;
        }

        public function validate_form() {
            $errors = null;
            // Check if empty
            if(empty($this->user->getUsername())) {
                $errors['username_err'] = 'Please enter a username';
            }
            if(empty($this->user->getFirstname())) {
                $errors['prenom_err'] = 'Please enter your surname';
            }
            if(empty($this->user->getLastname())) {
                $errors['nom_err'] = 'Please enter your name';
            }
            if(empty($this->user->getEmail())) {
                $errors['email_err'] = 'Please enter an email';
            }
            if(empty($this->user->getPassword()) || strlen($this->user->getPassword()) < 8) {
                $errors['password_err'] = 'Password must be at least 8 characters';
            }
            if(empty($this->user->getConfirmpassword())) {
                $errors['confirm_password_err'] = 'Please confirm password';
            }

            //Validate Email
            if (!filter_var($this->user->getEmail(), FILTER_VALIDATE_EMAIL) && empty($errors['email_err'])) {
                $errors['email_err'] = 'Please enter a valid email adress';
            }
            //Check if password match
            if($this->user->getPassword() !== $this->user->getConfirmpassword() && empty($errors['confirm_password_err'])) {
                $errors['confirm_password_err'] = "Password don't match";
            }
            return $errors;
        }
    }