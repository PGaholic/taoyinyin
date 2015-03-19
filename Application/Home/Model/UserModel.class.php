<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
  protected $_validate=array(
    array('uname', 'isempty', '请输入手机号', 0, 'callback', 1),
    array('uname', 'number', '手机号格式不正确'),
    array('upass', 'isempty', '请输入密码', 0, 'callback', 1),
    array('upass', '6,30', '请设置密码为6-30位', 0, 'length'),
    array('repass', 'upass', '两次输入密码不一致', 0, 'confirm'),
    array('captcha', 'isempty', '验证码不正确', 0, 'callback', 1)
  );	
  
  protected function isempty($t){
    if($t) return true;
    else return false;
  }
	
	
}





?>