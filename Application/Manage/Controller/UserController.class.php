<?php
namespace Manage\Controller;
use Manage\Controller;
class UserController extends BaseController {
	function __construct()
	{
		BaseController::__construct();
		$this->default_page = U('lists');
		$this->count = M('user')->count();
	}

	public function lists()
	{
		$page = I('get.p', 1, 'int');
		$limit = I('get.each', 15, 'int');
		$uname = I('get.uname');

		if ($uname) {
			$this->user = M('user')->where(array('uname' => array('LIKE', "%{$uname}%")))->limit(($page - 1) * $limit, $limit)->select();
			$count = M('user')->where(array('uname' => array('LIKE', "%{$uname}%")))->count();
			$page_obj       = new \Think\Page($count, $limit);
		}else{
			$this->user = M('user')->limit(($page - 1) * $limit, $limit)->select();
			$page_obj       = new \Think\Page($this->count, $limit);
		}

		$this->assign('page', $page_obj->show());
		$this->display(T('default/user/index'));
	}

	public function edit()
	{
		$uid = I('get.id', 1, 'int');
		if (IS_POST) {
			$uname = I('post.uname', '', 'number_int');
			$pass = I('post.passwd');
			$point = I('post.point', 0, 'int');
			if (empty($uname)) {
				$this->error('用户名必须为手机号');
			}
			if ($point < 0) {
				$this->error('积分不能小于0');
			}
			$data = array(
				'uid' => $uid,
				'uname' => $uname,
				'email' => I('post.email', '','email'),
				'address' => I('post.address'),
				'school' => I('post.school'),
				'grade' => I('post.grade'),
				'point' => $point,
				'used' => I('post.used', 1, 'int')
			);
			if (!empty($pass)) {
				$data['passwd'] = md5($pass);
			}
			M('user')->save($data);
		}
		$this->user = M('user')->find($uid);
		$this->display(T('default/user/edit'));
	}

	public function add()
	{
		if (IS_POST) {
			$uname = I('post.uname', '', 'number_int');
			$pass = I('post.passwd');
			$point = I('post.point', 0, 'int');
			if (empty($uname)) {
				$this->error('用户名必须为手机号');
			}
			if (empty($pass)) {
				$this->error('密码不能为空');
			}
			if ($point < 0) {
				$this->error('积分不能小于0');
			}
			$data = array(
				'uname' => $uname,
				'email' => I('post.email', '','email'),
				'passwd' => md5($pass),
				'address' => I('post.address'),
				'school' => I('post.school'),
				'grade' => I('post.grade'),
				'regtime' => time(),
				'regip' => I('server.REMOTE_ADDR'),
				'point' => $point,
				'used' => I('post.used', 1, 'int')
			);
			M('user')->add($data);
			redirect(U('lists'));
		}
		$this->display(T('default/user/add'));
	}

	public function del()
	{
		$uid = I('get.id', 0, 'int');
		if ($uid > 0) {
			$data = array(
				'uid' => $uid,
				'used' => 0
			);
			M('user')->save($data);
			redirect(U('lists'));
		}else{
			$this->error('用户ID错误');
		}
	}

}
