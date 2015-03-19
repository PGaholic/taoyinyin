<?php
namespace Manage\Controller;
use Manage\Controller;
class IndexController extends BaseController {
	function __construct()
	{
		BaseController::__construct();
	}

    public function index()
    {
    	$config = array(
    		U('/Manage/System/Admin'),
    		U('/Manage/System/Set'),
    		U('/Manage/User/Lists'),
    		U('/Manage/Shop/Lists'),
    		U('/Manage/Order/Lists'),
    		U('/Manage/Status/Index')
       	);
    	$this->assign('config', $config);
        $this->display(T('default/index'));
    }

    public function logout()
    {
        session('admin', null);
        redirect(U('/Manage/Login'));
    }
}