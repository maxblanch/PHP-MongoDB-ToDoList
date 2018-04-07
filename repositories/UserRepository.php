<?php
    class UserRepository {
        
        private $collection = 'devdb.users';

        public function __construct() {
            require_once('./repositories/Database.php');
        }

        public function validate($user) {
            $manager = Database::getInstance();
            $filter = [
                'username' => ['$eq' => $user->getUsername()],
                'password' => ['$eq' => $user->getPassword()]
            ];
            $query = new MongoDB\Driver\Query($filter);
            $cursor = $manager->executeQuery($this->collection, $query);
            return (count($cursor->toArray()) > 0);
        }

        public function create($user) {
            $manager = Database::getInstance();
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert($user->jsonSerialize());
            $result = $manager->executeBulkWrite($this->collection, $bulk);
            return $result->getInsertedCount() > 0;
        }

    }