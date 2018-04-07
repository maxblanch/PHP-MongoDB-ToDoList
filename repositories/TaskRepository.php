<?php
    class TaskRepository {

        private $collection = "devdb.tasks";

        public function __construct() {
            require_once('./repositories/Database.php');
        }

        public function create($task){
            $db = Database::getInstance();
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert($task->jsonSerialize());
            $result = $db->executeBulkWrite($this->collection, $bulk);
            return $result->getInsertedCount() > 0;
        }

        public function getAll() {
            $db = Database::getInstance();
            $filter = [
                'user' => ['$eq' => $_SESSION['username']]
            ];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $db->executeQuery($this->collection, $query);
            $results = array();
            foreach($cursor->toArray() as $result) {
                $task = Task::fromDocument($result);
                array_push($results, $task);
            }
            return $results;
        }

        public function delete($taskId) {
            $db = Database::getInstance();
            $bulk = new MongoDB\Driver\BulkWrite;
            $filter = [
                '_id' => new MongoDB\BSON\ObjectId($taskId)
            ];
            $bulk->delete($filter);
            $result = $db->executeBulkWrite($this->collection, $bulk);
            return $result->getDeletedCount() > 0;
        }

        public function get($taskId) {
            $db = Database::getInstance();
            $filter = [
                '_id' => ['$eq' => new MongoDB\BSON\ObjectId($taskId)]
            ];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $db->executeQuery($this->collection, $query);
            $result;
            foreach($cursor->toArray() as $result) {
                $result = Task::fromDocument($result);
            }
            return $result;
        }

        public function update($task, $taskId) {
            $db = Database::getInstance();
            $filter = [
                '_id' => ['$eq' => new MongoDB\BSON\ObjectId($taskId)]
            ];
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update($filter, $task->jsonSerialize());
            $result = $db->executeBulkWrite($this->collection, $bulk);
            return $result->getUpsertedCount() > 0;
        }
    }