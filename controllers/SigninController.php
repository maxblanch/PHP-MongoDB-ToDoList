<?php
    class SigninController {
        
        private $model;
        private $service;

        public function __construct($model, $service) {
            $this->model = $model;
            $this->service = $service;
            require_once('views/SigninView.php');
            require_once('repositories/User.php');
        }

        public function requestSignin($data = null) {
            $view = new SigninView();
            $view->renderSigninForm($data);
        }

        public function processSignin() {
            $this->model->setUser(new User());
            $this->model->user->setUsername(strip_tags($_POST['userLogin']));
            $this->model->user->setPassword(strip_tags($_POST['userPassword']));
            if($this->service->validate($this->model->getUser())) {
                $_SESSION['username'] = $this->model->user->getUsername();
                $_SESSION['user'] = $this->model->getUser();
                $_SESSION['timestamp'] = time();
                require_once('HomeController.php');
                require_once('models/HomeModel.php');
                require_once('repositories/TaskRepository.php');
                $controller = new HomeController(new HomeModel(), new TaskRepository());
                $controller->home();
            } else {
                $data['username_err'] = "This username doesn't exist";
                $data['password_err'] = "The password doesn't match";
                $this->requestSignin($data);
            }
        }

        public function processSignout() {
            session_unset();
            session_destroy();
            $this->requestSignin();
        }
    }