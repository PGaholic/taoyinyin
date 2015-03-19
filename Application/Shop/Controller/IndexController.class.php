<?php
namespace Shop\Controller;
use Shop\Controller;
class IndexController extends BaseController {
	function __construct()
	{
		BaseController::__construct();
	}

    public function index()
    {
    	$config = array(
    		U('/Shop/Shop'),
    		U('/Shop/Order/Lists'),
       	);
    	$this->assign('config', $config);
        $this->display(T('default/index'));
    }

    public function logout()
    {
        session('shop', null);
        redirect(U('/Shop/Login'));
    }
}