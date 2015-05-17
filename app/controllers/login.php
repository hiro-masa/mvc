<?php

class LoginController extends Controller {

	public function __construct($func="index"){
		parent::__construct("login");
		$this->setPostKey("uid;token");
		$this->setKey("err");
		$this->Data['title'] = APPNAME."";
		$this->Data['topurl'] = TOPURL."";
		$this->$func();
	}
	public function index(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$this->login();
		}
		
		$this->Data['token'] = setToken();
		$this->view('login/index');
		
	}
	public function login(){
		session_regenerate_id(true);
		if($uinfo = $this->Model->getUserInfo($this->Data['Post']['uid'], $this->Data['Post']['upw'])){
			$this->welcome($uinfo);
		}else{
			$this->Data['err'] = "wrong id or password";
			header("Refresh:1; url=".TOPURL."");
		}
	}
	private function welcome($uinfo){
		$_SESSION['role'] = $uinfo['role'];
		$_SESSION['uid'] = $uinfo['uid'];
		echo 'login successful ';
		header("Refresh:0; url=".TOPURL."home");
		exit;
	}
	
}