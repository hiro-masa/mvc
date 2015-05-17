<?php

class HomeController extends Controller {

	public function __construct(){
		$this->index();
	}

	public function index(){
		$this->Data['iframe'] = '<iframe src="info"></iframe>';
		$this->Data['title'] = APPNAME."";
		$this->view("home/index");
	}
	public function Home(){
		
	}

}
