<?php
namespace Manage\Controller;
use Manage\Controller;
class AttachmentController extends BaseController {
	function __construct()
	{
		BaseController::__construct();
        set_time_limit(0);
	}

	public function download()
	{
		$aid = I('get.id', 0, 'int');
		$file = M('attachment')->find($aid);
		$file['loc'] = realpath(THINK_PATH . '..' . $file['loc']);
		if (is_file($file['loc'])) {
			header('Content-type: application/octet-stream');
			header('Content-Encoding: none');
			header('Content-Transfer-Encoding: binary');
			header('Content-length: ' . filesize($file['loc']));
			header('Content-disposition: attachment;filename="'.$file['name'].'"');
			readfile($file['loc']);
		}else{
			header('HTTP/1.1 404 Not Found');
		}
	}


}

?>