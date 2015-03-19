<?php
namespace Shop\Controller;
use Shop\Controller;
class LoginController extends BaseController {
	function __construct()
	{
		BaseController::__construct();
	}

	public function index()
	{
		$alert = '';
		if (IS_POST) {
			$uname = I('post.uname');
			$upass = I('post.upass');
			$captcha = I('post.captcha');
			$Verify = new \Think\Verify();
			if (empty($uname) || empty($upass)) {
				$alert = '账号或密码不能为空';
			}else if(!$Verify->check($captcha)){
				$alert = '验证码错误';
			}else{
				$admin = M('shop')->where(array('sname' => $uname))->find();
				if ($admin['passwd'] === md5($upass)) {
					unset($admin['passwd']);
					session('shop', $admin);
					redirect(U('/Shop'));
				}else{
					$alert = '账号或密码错误';
				}
			}
		}
		$this->assign('alert', $alert);
		$this->display(T('default/login'));
	}

	public function captcha()
	{
		$Verify = new \Think\Verify();
		$Verify->fontSize = 16;
		$Verify->entry();
	}

}