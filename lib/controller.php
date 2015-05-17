<?php

class Controller {
	public $Data = Array();
    public $Template = "";
	protected $Model;


	public function __construct($model=null){
		if(!empty($model) && empty($Model)){
            $mfile = '../app/models/'.$model.'.php';
            if(file_exists($mfile)){
                require_once $mfile;
                $mdlname = $model."Model";
                $this->Model = new $mdlname();
            }else{
                $this->err("404");
            }
		}
		if(isset($_POST)){
            foreach($_POST as $key=>$val){
                $this->Data['Post'][$key] = escp($val);
            }
        }else{
            $this->Data['Post'] = array();
        }
        if(isset($_GET)){
            foreach($_GET as $key=>$val){
                $this->Data['Get'][$key] = escp($val);
            }
        }else{
            $this->Data['Get'] = array();
        }
        if(isset($_SESSION['role'])){
            foreach($_SESSION as $key=>$val){
                $this->Data['Sess'][$key] = escp($val);
            }
        }else{
            $this->Data['Sess'] = array();
        }
	}
    public function setPostKey($keys){
        $arrkeys = explode(";", $keys);
        foreach($arrkeys as $key){
            if(!isset($this->Data['Post'][$key]) || empty($this->Data['Post'][$key])){
                $this->Data['Post'][$key] = "";
            }
        }
    }
    public function setKey($keys){
        $arrkeys = explode(";", $keys);
        foreach($arrkeys as $key){
            if(!isset($this->Data[$key]) || empty($this->Data[$key])){
                $this->Data[$key] = "";
            }
        }
    }
	public function view($template){
		$this->Template = $template;
	}
    public function err($no){
        die("error ".$no);
    }
}

