<?php
namespace Manage\Controller;
use Manage\Controller;
class SystemController extends BaseController {
	function __construct()
	{
		BaseController::__construct();
        $this->default_page = U('admin');
	}

    public function admin()
    {
    	$admin = M('Admin')->select();
    	$this->assign('admin', $admin);
        $this->display(T('default/admin/index'));
    }

    public function add()
    {
    	if (IS_POST) {
    		$uname = I('post.uname');
    		$upass = I('post.upass');
    		if (empty($uname) || empty($upass)) {
    			$this->error('账号或密码不能为空');
    		}
    		$data = array(
    			'name' => $uname,
    			'passwd' => md5($upass)
    		);
    		M('admin')->add($data);
    		redirect(U('Admin'));
    	}
    	$this->display(T('default/admin/add'));
    }

    public function del()
    {
    	$aid = I('get.aid', 0, 'int');
    	$admin = M('admin');
    	if ($aid > 0) {
    		if ($this->myadmin['aid'] == $aid) {
    			$this->error('不能删除自己', U('admin'));
    		}
    		$admin->delete($aid);
    		redirect(U('Admin'));
    	}else{
    		$this->error('管理员ID错误');
    	}
    }

    public function edit()
    {
    	$aid = I('get.aid', 1, 'int');
    	$admin = M('Admin')->where(array('aid' => $aid))->find();
    	$admin['lasttime'] = $this->date($admin['lasttime']);
    	$this->assign('admin', $admin);
    	$this->display(T('default/admin/edit'));
    }

    public function set()
    {
        if (IS_POST) {
            $site_name = I('post.title');
            $domain = I('post.domain');
            $authkey = I('post.authkey');
            if (empty($site_name)) {
                $this->error('网站标题不能为空');
            }
            if(empty($domain)){
                $this->error('网站地址不能为空');
            }
            if (empty($authkey)) {
                $this->error('安全码不能为空');
            }
            $data = array(
                'site_name' => $site_name,
                'site_descript' => I('post.description'),
                'site_keyword' => I('post.keyword'),
                'root_email' => I('post.adminemail'),
                'icp_code' => I('post.icpcode'),
                'stat_code' => I('post.statcode'),
                'site_url' => $domain,
                'web_open' => I('post.web_open', 1, 'int'),
                'reg_open' => I('post.reg_open', 1, 'int'),
                'print_open' => I('post.print_open', 1, 'int')
            );
            foreach ($data as $key => $val) {
                $update = M('option');
                $update->oval = $val;
                $update->where(array('okey' => $key))->save();
            }
            $this->InitGlobalCache();

            if(C('AUTH_KEY') != $authkey){
                $conf_file = realpath(COMMON_PATH . 'Conf/config.php');
                $config = include($conf_file);
                $config['AUTH_KEY'] = $authkey;
                file_put_contents($conf_file, "<?php\nreturn " . var_export($config, TRUE) . ";\n?>");
                C('AUTH_KEY', $authkey);
            }
        }
        $cache = array();
        $option = M('option')->select();
        foreach ($option as $row) {
            if ($row['osort'] == 'str')
            {
                $cache[$row['okey']] = $row['oval'];
            }
            else if($row['osort'] == 'int')
            {
                $cache[$row['okey']] = intval($row['oval']);
            }
        }
        $this->assign('auth_key', C('AUTH_KEY'));
        $this->assign('option', $cache);
    	$this->display(T('default/setting/index'));
    }

}