<?php
namespace Home\Controller;
use Home\Controller;
class IndexController extends FrontController {
	function __contruct()
	{
		FrontController::__construct();
	}

    public function index()
    {
    	$this->display('/index');
    }
    
    public function uploadFile(){
    	if(IS_POST){
    		$data='';
        if(session('?admin')) $data=1;
        echo $data;
      }
    }
    
    
}