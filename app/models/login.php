<?php

class LoginModel extends Model {
	
	public function getUserInfo($uid, $upw){
		if($uid=="admin" && $upw=="admin"){// check db:user 
			return array("uid"=>"admin","role"=>"admin");
		}else{
			return false;
		}
	}
}