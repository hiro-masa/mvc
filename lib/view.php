<?php

class SView {
	
	function show($template="err/0", $data){
        $tmp = Array();
		$tmp = explode("/", $template);
        if(empty($tmp[0])){ $tmp[0] = "err";}
        if(empty($tmp[1])){ $tmp[1] = "0";}
		$smarty = new Smarty();
		$smarty->php_handling = Smarty::PHP_ALLOW;
        $smarty->template_dir = "../app/views/". $tmp[0];
        $smarty->compile_dir = "../app/views/.tpl_cache";
        $smarty->cache_dir = "../app/views/.cache";
        $smarty->config_dir = "../app/views/.config";
		//$smarty->plugins_dir[] = 'Smarty/plugins';
        $smarty->caching = 0;
        
        if(!empty($data)){
            foreach($data as $key=>$val){
            	$smarty->assign($key, $val);
            }
            //extract($data);
        }
        if(isset($template)){
            $smarty->display($tmp[1].'.tpl');
        }else{
            exit;
        }
	}
}

class View {
    
    function show($template="err/0", $data){
        $tmp = Array();
        $tmp = explode("/", $template);
        if(empty($tmp[0])){ $tmp[0] = "err";}
        if(empty($tmp[1])){ $tmp[1] = "0";}
        
        if(!empty($data)){
            extract($data);
        }
        if(isset($template)){

            require_once '../app/views/common/header.phtml';
            require_once '../app/views/'.$template.'.phtml';
            require_once '../app/views/common/footer.phtml';

        }else{
            exit;
        }
    }
}