<?php

namespace Home\Controller;

use Home\Common\Util as util;

class UploadController extends CommonController{

	public function pic () {

		$data = util\UploadUtil::getInstance()->uploadPic();
		$this->ajaxReturn($data);
	}

}