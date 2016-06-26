<?php

namespace Home\Common\Util;

use Think\Upload;

class UploadUtil {

	private static $instance;

	private function __construct () {

	}

	public static function getInstance () {
		if (isset(self::$instance)) {
			return self::$instance;
		}

		self::$instance = new UploadUtil();
		return self::$instance;
	}


	public function uploadPic ($callback="") {
		$upload = new Upload();
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Application/Public/data/'; // 设置附件上传根目录
        $upload->autoSub = false;
        // 上传文件
        $info   =   $upload->upload();
        $data = [];
        if(!$info) {// 上传错误提示错误信息
        	$data = [
        		'result'=>0,
        		'errMsg'=>$upload->getError(),
        	];
            
        }else{// 上传成功
        	if (!empty($callback)) {
        		$callback($info);
        	}
        	
            $data = [
            	'result'=>1
            ];
        }

        return $data;
	}

}