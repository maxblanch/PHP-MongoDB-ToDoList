<?php
    if ($_POST['userLogin'] === 'admin' && $_POST['userPassword'] === 'admin') {
        session_start();
        $_SESSION['name'] = $_POST['userLogin'];
        setcookie('admin', 'admin', time() + 60, '/');
        header("location: ../index.php?controller=Home&action=home");
    } else {
        header("Location: ../index.php?controller=Signin&action=processSignin");
    }