<?php

/** include **/
require_once '../app/config/main.php';
require_once '../app/lang/'.LANG.'.php';
require_once '../lib/functions.php';
require_once '../lib/controller.php';
require_once '../lib/model.php';
require_once '../lib/view.php';
//require_once 'Smarty/SmartyBC.class.php';

/** auth **/
session_start();
session_set_cookie_params(0, '/mvc/');
if(!chkSession("role") || empty($_GET)){
	$_GET['url'] = "login/index";
}

/** get requests **/
$req = explode("/", h($_GET['url']));
if(empty($req[0])){$req[0] = "home";}
if(empty($req[1])){$req[1] = "index";}

/** action **/
$cfile = '../app/controllers/'.$req[0].'.php';
if(file_exists($cfile)){
	require_once $cfile;
	$ctrl = $req[0]."Controller";
	$app = new $ctrl($req[1]);
}else{
	die("not found the page");
}

/** show **/
if(!empty($app->Template)){	
	$view = new View();
	$view->show($app->Template, $app->Data);
}



