<?php
    class HomeModel {

        public $taskList = null;
        public $task = null;
        public $user = null;
        public $message = null;

        public function __construct() {}

        public function setTask($task) { $this->task = $task; }
        public function setUser($value) { $this->user = $value; }
        public function setMessage($value) { $this->message = $value; }
        public function setTaskList($value) { $this->taskList = $value; }

        public function getTask() { return $this->task; }
        public function getUser() { return $this->user; }
        public function getMessage() { return $this->message; }
        public function getTaskList() { return $this->taskList; }


        public function validateTask(){
            $errors = null;
            if (strlen($this->task->getNom()) == 0) {
                $errors['taskName_err'] = "Entrez le nom de votre tâche";
            }
            if (strlen($this->task->getDescription()) == 0) {
                $errors['taskDescription_err'] = "Entrez la description de votre tâche";
            }
            return $errors;
        }
            
    }