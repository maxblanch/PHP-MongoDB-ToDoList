<?php
    class HomeView {

        private $model;

        public function __construct($model) {
            $this->model = $model;
        }

        public function render($errors = null, $tasks = null) {
            require_once('views/inc/navbar.php');
            require_once('views/layouts/todo.php');
        }
    }