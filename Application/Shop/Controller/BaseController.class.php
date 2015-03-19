<?php
namespace Shop\Controller;
use Think\Controller;
class BaseController extends Controller {
	protected $wwwsite;
	public $myadmin;
	function __construct()
	{
		Controller::__construct();
		
		S(array('type'=>'File','expire'=>60));
		session(array('name'=>'auth_session', 'expire'=>3600));

		$this->CheckLogin();
		$this->InitGlobalCache();

		$this->wwwsite = C('WWW_SITE');
		$this->assign('www', $this->wwwsite);
		$this->assign('myadmin', $this->myadmin);
		$this->form = I('server.HTTP_REFERER', '', 'magic_quotes');
	}

	protected function error($content, $jmp = 'javascript:history.back(-1)', $title = '出现错误', $status = 200)
	{
		$data = array(
			'title' => $title,
			'content' => $content,
			'status' => $status,
			'jmp' => $jmp
		);
		$this->assign($data);
		$this->display(T('default/error'));
		exit;
	}

	protected function date($time)
	{
		if (!$time) {
			$time = 0;
		}
		return date('Y/m/d H:i:s', $time);
	}

	protected function InitGlobalCache()
	{
		$cache = S('option');
		if (empty($cache) || !is_array($cache)) {
			$cache = array();
			$option = M('option')->select();
			foreach ($option as $row) {
				if ($row['osort'] == 'obj') 
				{
					$cache[$row['okey']] = unserialize($row['oval']);
				}
				else if($row['osort'] == 'int')
				{
					$cache[$row['okey']] = intval($row['oval']);
				}else{
					$cache[$row['okey']] = $row['oval'];
				}
			}
			S('option', $cache);
		}
		$this->cache = $cache;
	}

	private function CheckLogin()
	{
		if (in_array(CONTROLLER_NAME, array('Login'))) {
			return ;
		}
		$admin = session('shop');
		if ( empty($admin) || $admin['sid'] <= 0 ) {
			redirect(U('/Shop/Login'));
			exit;
		}
		$this->myadmin = $admin;
	}

}