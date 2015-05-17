<?php

class InfoController extends Controller {

	public function __construct(){
		$this->index();
	}

	public function index(){
		$this->Data['info'] = '<h2>Infomation</h2>';
		$this->Data['title'] = APPNAME."";
		$this->view("info/index");
	}
	public function Home(){

	}

}
