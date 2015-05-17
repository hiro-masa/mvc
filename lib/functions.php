<?php

function chkSession($sess_key){
	if(isset($_SESSION[$sess_key]) || !empty($_SESSION[$sess_key])){
		return true;
	}
	return false;
}




function connectDB(){
	try {
		return new PDO(DSN, DB_USER, DB_PASS);

	} catch (PDOException $e) {
		echo $e->getMessage();
		exit;
	}
}



function h($val){
	return htmlspecialchars($val, ENT_QUOTES, "UTF-8");
}



function escp($post) {
    if (is_array($post)) {
        return array_map("escp", $post);
    } else {
        if(get_magic_quotes_gpc()) {
            $post = stripslashes($post);
        }else{
            $post = htmlspecialchars($post, ENT_QUOTES, 'UTF-8'); //mb_internal_encoding());
        }
        return $post;
    }
}



/** 
 * [LC description]
 * @param [string] $key []
 * @param [array] $Lang [ array(en=>jp) ]
 */
function LC($key){
    global $Lang;
    return (empty($Lang[trim($key)])) ? trim($key) : $Lang[trim($key)];
}

function setToken(){
	if (!isset($_SESSION['token'])){
		$_SESSION['token'] = sha1(uniqid(mt_rand(), true));
	}
	return $_SESSION['token'];
}

function chkToken(){
	if (empty($_POST['token']) || $_POST['token'] != h($_SESSION['token'])) {
		return false;
	}
	return true;
}

