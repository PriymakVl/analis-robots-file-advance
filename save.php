<?php

include_once 'classes/RobotsTxt.php';
include_once 'functions.php';


try {
    $robotsTxt = new RobotsTxt($_GET['site']);
} catch (Exception $ex) {
    $error = $ex->getMessage();
    include_once 'views/error.php';
    exit();
}

mydebug($robotsTxt);
