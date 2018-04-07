<?php
    class SignupController {

        private $model;
        private $service;

        public function __construct($model, $service) {
            $this->model = $model;
            $this->service = $service;
            require_once('views/SignupView.php');
            require_once('controllers/HomeController.php');
            require_once('models/HomeModel.php');
            require_once('repositories/User.php');
        }

        public function requestSignup($errors = null) {
            $view = new SignupView($this->model);
            $view->renderSignupForm($errors);
        }

        public function requestConfirmSignup() {
            $view = new SignupView($this->model);
            $view->renderRegistered();
        }

        public function processSignup() {
            //Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //Store POST data in array
            $this->model->setUser(new User());
            $this->model->user->setUsername(strip_tags($_POST['userLogin']));
            $this->model->user->setFirstname(strip_tags($_POST['userPrenom']));
            $this->model->user->setLastname(strip_tags($_POST['userNom']));
            $this->model->user->setEmail(strip_tags($_POST['userEmail']));
            $this->model->user->setPassword(strip_tags($_POST['userPassword']));
            $this->model->user->setConfirmPassword(strip_tags($_POST['userConfirmPassword']));
            if($errors = $this->model->validate_form()) {
                $this->requestSignup($errors);
            } elseif ($this->service->create($this->model->getUser())) {
                $_SESSION['user'] = $this->model->getUser();
                $_SESSION['timestamp'] = time();
                /*
                $controller = new HomeController(new HomeModel());
                $controller->home();
                */
                $this->requestConfirmSignup();
            }
        }
    }