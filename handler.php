<?php
ini_set('display_errors','Off');
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);

include_once 'classes/Url.php';
include_once 'classes/RevisionRobots.php';

try {
	$url = new Url($_POST['url']);
    $url->validate()->getPathFile('robots.txt')->getHeader()->getCodeResponse()->getSizeFile();
	
	$revision = new RevisionRobots($url);
	$revision->getDirectives();
} catch (Exception $ex) {
    $error = $ex->getMessage();
    include_once 'error.php';
    exit();
}

$revision->checkSizeFile()->checkCodeResponce()->checkExistFile()->checkNumberOfDirectivesHost()->checkExistDirectiveHost()->checkExistDirectivesSitemap();
$response = $revision->response;


include_once 'result.php';
