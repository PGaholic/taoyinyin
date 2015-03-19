<?php
namespace Home\Controller;
use Home\Controller;
class SignController extends FrontController {
	function __construct()
	{
		FrontController::__construct();
	}
	
	public function index(){
	  $this->login();	
	}

	public function showerror()
	{
		$this->error('用户名或密码错误');
	}

	public function login()
	{
		if(session('admin')){
		  redirect(U('/Home/User'));	
		}elseif(cookie('login') && !session('sid')){ //判断cookie是否存在
			$c=cookie('login');
			$uname=$this->decrypt($c['uname']);
			$uid=$this->decrypt($c['uid']);
			$loginip=$this->decrypt($c['loginip']);
			$logintime=$this->decrypt($c['logintime']);
			
			if($list=M('User')->where(array('uid'=>$uid, 'uname'=>$uname))->find()){
				if(($list['loginip']==$loginip) && ((time()-$logintime)<C('COOKIE_TIME'))){
  		    $data['logintime']=time(); echo 'aa';
          $data['loginip']=get_client_ip(); 
          $save=M('User')->where(array('uid'=>$list['uid'], 'uname'=>$list['uname']))->save($data);
          if($save>0){
      			session('admin', $uname);
      			session('sid', uniqid());
            redirect(U('/Home/User'));
          }else{
            $this->display(T('sign/login'));	
          }
  		  }else{
			    $this->display(T('sign/login'));	
			  }
  		}else{
			  $this->display(T('sign/login'));	
			}
		}elseif(IS_POST){
			$uname = I('post.uname');
			$upass = I('post.upass');
			$loginState = I('post.loginState');
			if(!empty($uname) && !empty($upass)){
  		  $user = M('user')->where('uname='.$uname)->find();
  			if ($user['passwd'] == md5($upass)) {
  				$data['logintime']=time(); 
          $data['loginip']=get_client_ip(); 
          $save=M('User')->where(array('uid'=>$user['uid'], 'uname'=>$user['uname']))->save($data);
          if($save>0){
          	if($loginState=='on'){
            	cookie('login', array(
        				'uname' => $this->encrypt($user['uname']),
        				'uid' => $this->encrypt($user['uid']),
        				'loginip' => $this->encrypt($data['loginip']),
        				'logintime' => $this->encrypt($data['logintime'])
        			),C('COOKIE_TIME')); 
        		}
      			session('admin', $uname);
      			session('sid', uniqid());
            redirect(U('/Home/User'));
          }else{
			      $this->display(T('sign/login'));	
			    }
  			}else{
  				$this->error('用户名或密码错误');
  			}
			}else{
			  $this->display(T('sign/login'));	
			}
		}else{
		  $this->display(T('sign/login'));
		}
	}

	public function register()
	{
		if(IS_POST) $this->checkphone();
		$this->display('sign/signup');
	}

	public function checksign()
	{
		$info = '参数错误';
		if (IS_POST) {
			$data['uname'] = I('post.uname');
			$data['upass'] = I('post.upass');
			$data['repass'] = I('post.repass');
			$data['captcha'] = $this->check_verify(I('post.captcha'));
			$muser=D('User');
			if(!$muser->create($data)){
			  $info = $muser->getError();	
			}else{
				$count = M('user')->where(array('uname' => $data['uname']))->count();
				if ($count > 0) {
					$info = '该手机号已经注册';
				}else{
					//将用户信息保存到session
					session('signup', array(
						'uname' => $data['uname'],
						'passwd' => $data['upass'],
						'regip' => get_client_ip(),
						'regtime' => time()
					));
					 
					$info = '';
				}
			}
		}
		$data = array(
			'succ' => 0,
			'info' => $info
		);
		if (empty($info)) {
			$data['succ'] = 1;
		}
		$this->ajaxReturn($data);
	}

	public function send_mcode()
	{
		if (IS_POST) {
			//验证，发送手机验证码
			
			$this->ajaxReturn(1);
		}else{
			$this->ajaxReturn(0);
		}
	}
	
	public function checkphone()
	{
		$signup = session('signup');
		if (empty($signup) || !is_array($signup)) {
			$this->ajaxReturn(0);
		}else{
			//check phone code
			
      $data['uname']=$signup['uname'];
      $data['passwd']=md5($signup['passwd']);
      $data['regip']=$signup['regip'];
      $data['regtime']=$signup['regtime'];
      $data['loginip']=get_client_ip();
		  $data['logintime']=time();
			M('user')->add($data);
			session('signup', null);
	    session('admin', $data['uname']);
	    session('sid', uniqid());
			redirect(U('/Home/User'));
			
			$this->ajaxReturn(1);
		}
	}
	
	public function captcha()
	{
    $config = array(
      'fontSize'    =>    30,    
      'length'      =>    4,     
      'useNoise'    =>    false, 
      'useCurve'    =>    false,
      'codeSet'     =>    'abcdefghjkmnpqrstwxyABCDEFGHJKMNPQRSTWXY23456789',
      'bg'          =>    array(200, 200, 200)
    );
    $Verify = new \Think\Verify($config);
    $Verify->entry();
	}
	
	/*加密解密函数*/
  private function encrypt($str){
    $en=\Think\Crypt\Driver\Xxtea::encrypt($str, C("AUTH_KEY"));
    return base64_encode($en);
  }
  
  private function decrypt($str_en){
    $de=base64_decode($str_en);
    return \Think\Crypt\Driver\Xxtea::decrypt($de, C("AUTH_KEY"));
  }
  

}