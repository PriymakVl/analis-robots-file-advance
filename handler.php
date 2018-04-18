<?php
//ini_set('display_errors','Off');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once('libraries/phpexcel/Classes/PHPExcel.php');
include_once('functions.php');
include_once('classes/Url.php');
include_once('classes/RevisionRobots.php');
include_once('classes/Excel.php');
include_once('classes/ExcelRobots.php');


try {
	$url = new Url($_REQUEST['url']);
    $url->validate()->getPathFile('robots.txt')->getHeader()->getCodeResponse()->getSizeFile();
	
	$revision = new RevisionRobots($url);
	$revision->getDirectives();
} catch (Exception $ex) {
    $error = $ex->getMessage();
    include_once 'error.php';
    exit();
}

$revision->checkSizeFile()->checkCodeResponce()->checkExistFile()->checkNumberOfDirectivesHost()
	->checkExistDirectiveHost()->checkExistDirectivesSitemap();
	
$response = $revision->response;

if (isset($_POST['url'])) include_once('result.php');
else {
	$excel = new ExcelRobots($url, $response);
	$excel->bildSheet();
	$excel->uploadFile('revision.xls');
};

