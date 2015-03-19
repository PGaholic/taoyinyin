<?php
namespace Manage\Controller;
use Manage\Controller;
class ShopController extends BaseController {
	function __construct()
	{
		BaseController::__construct();
		$this->default_page = U('lists');
		$this->count = M('shop')->count();
	}

	public function lists()
	{
		$page = I('get.p', 1, 'int');
		$limit = I('get.each', 15, 'int');
		$name = I('get.name');

		$page_obj       = new \Think\Page($this->count, $limit);
		$this->assign('page', $page_obj->show());

		if ($name) {
			$this->shop = M('shop')->where(array('sname' => array('LIKE', "%{$name}%")))->limit(($page - 1) * $limit, $limit)->select();
		}else{
			$this->shop = M('shop')->limit(($page - 1) * $limit, $limit)->select();
		}
		$this->display(T('default/shop/index'));
	}

	public function edit()
	{
		$sid = I('get.sid', 1, 'int');
		if (IS_POST) {
			$uname = I('post.uname');
			$pass = I('post.upass');
			$shopname = I('post.shopname');
			$address = I('post.address');
			$mobile = I('post.mobile', '', 'number_int');
			if (empty($uname) || !preg_match('/[a-z0-9_]/i', $uname)) {
				$this->error('用户名为数字、字母、下划线组成');
			}
			if (empty($address)) {
				$this->error('地址不能为空');
			}
			if (empty($mobile)) {
				$this->error('电话格式不对');
			}
			if (empty($shopname)) {
				$this->error('打印店名称不能为空');
			}
			$data = array(
				'sid' => $sid,
				'sname' => $uname,
				'mobile' => $mobile,
				'shopname' => $shopname,
				'address' => $address,
				'boss' => I('post.boss'),
				'email' => I('post.email', '', 'email'),
				'detail' => I('post.detail'),
				'used' => I('post.used', 1, 'int')
			);
			if (!empty($pass)) {
				$data['passwd'] = md5($pass);
			}
			M('shop')->save($data);
		}
		$this->shop = M('shop')->find($sid);
		$this->display(T('default/shop/edit'));
	}

	public function add()
	{
		if (IS_POST) {
			$uname = I('post.uname');
			$pass = I('post.upass');
			$shopname = I('post.shopname');
			$address = I('post.address');
			$mobile = I('post.mobile', '', 'number_int');
			if (empty($uname) || !preg_match('/[a-z0-9_]/i', $uname)) {
				$this->error('用户名为数字、字母、下划线组成');
			}
			if (empty($pass)) {
				$this->error('密码不能为空');
			}
			if (empty($address)) {
				$this->error('地址不能为空');
			}
			if (empty($mobile)) {
				$this->error('电话格式不对');
			}
			if (empty($shopname)) {
				$this->error('打印店名称不能为空');
			}
			$data = array(
				'sname' => $uname,
				'passwd' => md5($pass),
				'mobile' => $mobile,
				'shopname' => $shopname,
				'address' => $address,
				'boss' => I('post.boss'),
				'email' => I('post.email', '', 'email'),
				'detail' => I('post.detail'),
				'used' => I('post.used', 1, 'int')
			);
			M('shop')->add($data);
			redirect(U('lists'));
		}
		$this->display(T('default/shop/add'));
	}

}