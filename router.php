<?php
    $action = null;
    $controller = null;

    $controllers = array(
        'Home' => ['home', 'error', 'processSignout', 'create', 'getAll', 'delete', 'markDone', 'markUndone', 'edit', 'save'],
        'Signup' => ['requestSignup', 'processSignup'],
        'Signin' => ['requestSignin', 'processSignin', 'processSignout']
    );

    function call($controller, $action) {
        require_once('controllers/' . $controller . 'Controller.php');
        require_once('models/' . $controller . 'Model.php');
        switch($controller) {
            case 'Signin':
            require_once('repositories/UserRepository.php');
                $display = new SigninController(new SigninModel(), new UserRepository());
                break;
            case 'Signup':
            require_once('repositories/UserRepository.php');
                $display = new SignupController(new SignupModel(), new UserRepository());
                break;
            case 'Home':
                require_once('./repositories/TaskRepository.php');
                $display = new HomeController(new HomeModel(), new TaskRepository());
                break;
            default:
                echo 'Bad things happen';
        }
        $display->{$action}();
    }

    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    } else {
        $controller = 'Signin';
        $action = 'requestSignin';
    }

    if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])) {
			call($controller, $action);
		} else {
			call('Signin', 'requestSignin');
		}
	} else {
		call('Home', 'error');
	}

