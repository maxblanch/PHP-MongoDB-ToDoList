<?php
session_start();
session_regenerate_id(true); 
require_once('views/inc/header.php');
require_once('router.php');
require_once('views/inc/footer.php');