<?php
namespace Home\Controller;
use Home\Controller;
class UserController extends BaseController {
	function __construct()
	{
		BaseController::__construct();
		$this->CheckLogin();
	}
	/*检查是否登录*/
	private function CheckLogin()
	{
		if ( empty(session('admin') ) ){  
			redirect(U('/Home/Sign/Login'));
			exit;
		}
		
	}
	
	public function index(){
	  $this->create_print();
	}
	
	/*退出*/
	public function logout(){
	  session('admin', null);
	  redirect(U('/Home/Sign/Login'));
	}
	/*上传函数*/
	private function upload($filename){  //参数为input标签的name
	  $config = array(
      'rootPath'   =>    C('UPLOAD_PATH'),        //上传根目录
      'savePath'   =>    '',                      //保存路径
      'mimes'      =>    array(),                 //允许上传文件MiMe类型
      'maxSize'    =>    0,                       //上传最大值，0不做限制
      'exts'       =>    array('doc', 'docx', 
                               'ppt', 'pptx', 
                               'pdf', 'csv', 
                               'xls', 'txt'),     //允许上传文件的后缀
      'subName'    =>    array('date', 'Y-m-d'),  //子目录命名规则
      'saveName'   =>    array('uniqid', ''),     //文件命名规则
      'saveExt'    =>    '',                      //文件保存后缀，空则使用原后缀
      'replace'    =>    false,                   //同名文件是否覆盖
    );
    $Upload = new \Think\Upload($config);
    $f=$Upload->upload();
    $return=array(); //返回值
    if(is_array($f)){
      $data['loc']=C('UPLOAD_PATH').$f[$filename]['savepath'].$f[$filename]['savename'];
      $data['name']=$f[$filename]['name'];
      $data['uid']=M('User')->where('uname='.session('admin'))->getField('uid');
      $data['uniqid']=session('sid');
      if(M('Attachment')->add($data)>0){
      	$return['tid']=M('Attachment')->where($data)->getField('tid');
      	$return['name']=$data['name'];
      	$return['time']=date('Y-m-d', time());
      }
    }
    
    return $return;
	}
	//上传
	public function create_upload(){
		if(IS_POST){
	    $data=$this->upload('Filedata');
	  }
	  
	  $this->ajaxReturn($data);
	}
	//创建打印
	public function create_print(){
		if(IS_POST){
			$ft=I('post.')['data'];
			$add1=$this->insert_order();
			$add2=$this->insert_order_attach();
			if($add1 && $add2){
				//print_r(I('post.'));
				/*$strNum='';
        foreach($ft as $arr){
          $strNum.=$arr['file_id'].',';	
        }
				$rcode=array('rcode'=>M('Order')->where('attach='.$strNum)->getField('rcode'));
				$result=array_merge($ft,$rcode);*/
			  
			  $this->ajaxReturn(1);
			  //print_r($result);
			}
	  }else{
	  	$uid=M('User')->where('uname='.session('admin'))->getField('uid');
	    $count=M('Order')->where('order_uid='.$uid)->count();
	  	$this->assign('length', $count);
	  	$this->display('create_print');
	  }
	}
	
	//用户信息
	public function user_info(){
		if(IS_POST){
			$p=I('post.');print_r($p);
			$data['nickname']=$p['nickname'];
			$data['sex']=$p['sex'];
			$data['school']=$p['school'];
			$data['major']=$p['major'];
			$data['grade']=$p['grade'];
			$data['email']=$p['email'];
			if(M('User')->where('uname='.session('admin'))->save($data)) 
			  redirect('user_info');
			else 
			  $this->error('修改失败');
		}else{
	    $list=M('User')->where('uname='.session('admin'))->select();
      $count=M('Order')->where('order_uid='.$list[0]['uid'])->count();
  	  $this->assign('length', $count);
  	  $this->assign('list', $list[0]);
  	  $this->display();	
  	}
	}
	
	//打印历史记录
	public function history_order(){
		$uid=M('User')->where('uname='.session('admin'))->getField('uid');
		//$data['filename']=M('Attachment')->where('order_uid='.$uid)->getField('name');
		$ridarr=M('Order')->where('order_uid='.$uid)->field('rid')->order('rid desc')->select();
		
		for($t=0;$t<count($ridarr);$t++){
		  $arrs=M('Order_attach')->where('oid='.$ridarr[$t]['rid'])->select();
  		$list=M('Order')->where('rid='.$ridarr[$t]['rid'])->select();
  		$data[$t][0]['time']=date('Y-m-d', $list[0]['time']);
  		$data[$t][0]['rcode']=$list[0]['rcode'];
  		for($i=0;$i<count($arrs);$i++){
  		  $data[$t][$i]['file_name']=M('Attachment')->where('tid='.$arrs[$i]['aid'])->getField('name');
  		  $data[$t][$i]['file_num']=$arrs[$i]['file_num'];
  		  $data[$t][$i]['paper_size']=$arrs[$i]['paper_size'];
  		  $data[$t][$i]['paper_color']=$arrs[$i]['paper_color'];
  		  $data[$t][$i]['is_double']=$arrs[$i]['is_double'];
  		  $data[$t][$i]['print_range']=$arrs[$i]['print_range'];
  		  $data[$t][$i]['print_block']=$arrs[$i]['print_block'];
  		  $data[$t][$i]['address']=M('Order')->where('rid='.$ridarr[$t]['rid'])->getField('order_address');
  		}	
		}
	  $this->assign('length', count($data));
	  $this->assign('data', $data);
	  $this->display();
	}
	
	//插入数据到tyy_order表
	private function insert_order(){
		  $ft=I('post.')['data'];
		  $end=end($ft);
	  $data['rcode']=uniqid('tyy');
	    $uid=M('User')->where('uname='.session('admin'))->getField('uid');
		$data['order_uid']=$uid;
    $data['order_address']=$end['location'];	
    $data['order_sid']=0;	
    $data['status']=0;
      $strNum='';
      array_pop($ft);
      foreach($ft as $arr){
        $strNum.=$arr['file_id'].',';	
      }
    $data['attach']=$strNum;//附件id	
    $data['time']=time();
    $data['order_money']=0;	
	  $data['message']=$end['message_board'];
		$data['finish_time']='';
		$data['order_mobile']=$end['connect_phone'];
    $data['recvname']=$end['pickup_person'];	
    $data['uniqid']=session('sid');
    if(M('Order')->add($data)>0){
    	return true;
    }
    return false;
	}
	//插入数据到tyy_order_attach表
	private function insert_order_attach(){
		$arrs=I('post.')['data'];
		array_pop($arrs);
		$return=true;
		foreach($arrs as $arr){
  		  $where['order_uid']=M('User')->where('uname='.session('admin'))->getField('uid');
  		  $where['uniqid']=session('sid');
  		  $strNum='';
        foreach($arrs as $arr){
          $strNum.=$arr['file_id'].',';	
        }
        $where['attach']=$strNum;
  		$data['oid']=M('Order')->where($where)->getField('rid');
  		
  		$data['aid']=$arr['file_id'];
      $data['file_num']=$arr['file_num'];	
      $data['paper_size']=$arr['paper_size'];	
      $data['paper_color']=$arr['is_colorful'];	
      $data['is_double']=$arr['is_double'];	
      $data['print_range']=empty($arr['print_range'])? $arr['print_range']:"{$arr['min_page']},{$arr['max_page']}";
      $data['print_block']=$arr['block_num'];
      
      if(M('Order_attach')->add($data)<=0) $return=false;	
    }
    return $return;
	}
	

}