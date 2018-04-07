<?php
    class Database {

        private static $instance = NULL;
        private static $uriOptions = [
            'username' => 'admin',
            'password' => 'admin123',
            'authMecanism' => 'SCRAM-SHA-1'
        ];

        private function __construct() {}
        private function __clone() {}

        public static function getInstance() {
            if(!isset(self::$instance)) {
                self::$instance = new MongoDB\Driver\Manager("mongodb://mongo-box:27017/devdb", self::$uriOptions);
                self::$instance->executeCommand('devdb', new MongoDB\Driver\Command(['ping' => 1]));
            }
            return self::$instance;
        }
    }
?>