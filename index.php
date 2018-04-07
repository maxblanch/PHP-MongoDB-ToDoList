<?php
session_start();
session_regenerate_id(true); 
print $_SESSION['username'];
require_once('views/inc/header.php');
require_once('router.php');
require_once('views/inc/footer.php');