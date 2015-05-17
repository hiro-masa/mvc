<?php

class LogoutController extends Controller {
	
	public function __construct(){
		
		$_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-86400, '../mvc3/');
        }
        session_destroy();
        header("Refresh:0; url=".TOPURL);
	}
}