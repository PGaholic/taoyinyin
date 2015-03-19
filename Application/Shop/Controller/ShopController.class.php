<?php
namespace Shop\Controller;
use Shop\Controller;
class ShopController extends BaseController {
	function __construct()
	{
		BaseController::__construct();
	}

	public function index()
	{
		$sid = $this->myadmin['sid'];
		if (IS_POST) {
			$pass = I('post.upass');
			$shopname = I('post.shopname');
			$address = I('post.address');
			$mobile = I('post.mobile', '', 'number_int');
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
				'mobile' => $mobile,
				'shopname' => $shopname,
				'address' => $address,
				'boss' => I('post.boss'),
				'email' => I('post.email', '', 'email'),
				'detail' => I('post.detail')
			);
			if (!empty($pass)) {
				$data['passwd'] = md5($pass);
			}
			M('shop')->save($data);
		}
		$this->shop = M('shop')->find($sid);
		$this->display(T('default/shop/edit'));
	}

}