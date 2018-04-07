<?php
    class HomeController {

        private $model = null;
        private $service = null;

        public function __construct($model, $service) {
            $this->model = $model;
            $this->service = $service;
            $this->model->setUser($_SESSION['username']);
            require_once('repositories/Task.php');
            require_once('views/HomeView.php');
        }

        public function home($errors = null) {
            if(isset($_SESSION['user'])) 
            {
                $tasks = $this->getAll();
                $view = new HomeView($this->model);
                $view->render($errors, $tasks);
            } 
            else
            {
                require_once('views/SigninView.php');
                $view = new SigninView();
                $view->renderSigninForm($data = null);
            }
        }

        public function create() {
            $this->model->setTask(new Task());
            $this->model->task->setUser($_SESSION['username']);
            $this->model->task->setNom($_POST['taskName']);
            $this->model->task->setDescription($_POST['taskDescription']);
            $this->model->task->setDate(date('Y/m/d'));
            $this->model->task->setCompleted(false);
            if($errors = $this->model->validateTask()) {
                $this->home($errors);
            } elseif ($this->service->create($this->model->getTask())) {
                $_SESSION['status'] = "The task was successfully added";
                $this->model->setMessage = "The task was successfully added";
                $controller = new HomeController(new HomeModel(), new TaskRepository());
                $controller->home();
            }
        }

        public function getAll() {
            return $this->service->getAll();
        }

        public function delete() {
            if($this->service->delete($_GET['id'])) {
                $_SESSION['status'] = "The task was successfully deleted";
                $controller = new HomeController(new HomeModel(), new TaskRepository());
                $controller->home();
            } else {
                $controller = new HomeController(new HomeModel(), new TaskRepository());
                $controller->home();
            }
        }

        public function markDone() {
            if($task = $this->service->get($_GET['id'])) {
                $_SESSION['status'] = "The task was successfully updated";
                $this->model->setTask($task);
                $this->model->task->setCompleted(true);
                $this->service->update($this->model->getTask(), $_GET['id']);
                $controller = new HomeController(new HomeModel(), new TaskRepository());
                $controller->home();
            } else {
                $controller = new HomeController(new HomeModel(), new TaskRepository());
                $controller->home();
            }
        }

        public function markUndone() {
            if($task = $this->service->get($_GET['id'])) {
                $_SESSION['status'] = "The task was successfully updated";
                $this->model->setTask($task);
                $this->model->task->setCompleted(false);
                $this->service->update($this->model->getTask(), $_GET['id']);
                $controller = new HomeController(new HomeModel(), new TaskRepository());
                $controller->home();
            } else {
                $controller = new HomeController(new HomeModel(), new TaskRepository());
                $controller->home();
            }
        }

        public function edit() {
            if($task = $this->service->get($_GET['id'])) {
                $this->model->setTask($task);
                $tasks = $this->getAll();
                $view = new HomeView($this->model);
                $view->render($errors, $tasks);
            } else {
                $controller = new HomeController(new HomeModel(), new TaskRepository());
                $controller->home();
            }
        }

        public function save() {
            $this->model->setTask(new Task());
            $taskId = $_POST['taskId'];
            $this->model->task->setUser($_SESSION['username']);
            $this->model->task->setNom($_POST['taskName']);
            $this->model->task->setDescription($_POST['taskDescription']);
            $this->model->task->setDate($_POST['taskDate']);
            $completed = ($_POST['taskCompleted'] === false) ? true : false;
            $this->model->task->setCompleted($completed);
            $this->service->update($this->model->getTask(), $taskId);
            $_SESSION['status'] = "The task was successfully updated";
            $controller = new HomeController(new HomeModel(), new TaskRepository());
            $controller->home();
            }
        }