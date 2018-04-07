<?php
    class User implements JsonSerializable {

        private $username = null;
        private $firstname = null;
        private $lastname = null;
        private $email = null;
        private $password = null;
        private $confirmpassword = null;

        public function __construct() {}

        public function getUsername() { return $this->username; }
        public function getFirstname() { return $this->firstname; }
        public function getLastname() { return $this->lastname; }
        public function getEmail() { return $this->email; }
        public function getPassword() { return $this->password; }
        public function getConfirmPassword() { return $this->confirmpassword; }

        public function setUsername($value) { $this->username = $value; }
        public function setFirstname($value) { $this->firstname = $value; }
        public function setLastname($value) { $this->lastname = $value; }
        public function setEmail($value) { $this->email = $value; }
        public function setPassword($value) { $this->password = $value; }
        public function setConfirmPassword($value) { $this->confirmpassword = $value; }

        public function jsonSerialize() {
            return [
                'username' => $this->username,
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'password' => $this->password,
                'confirmpassword' => $this->confirmpassword
            ];
        }

    }
?>