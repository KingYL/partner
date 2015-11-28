<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;
class IndexController extends CommonController {

    public function index(){
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfo(session("userId"));
        $this->assign("user", $userInfo);
        $this->display("Index/index");
//        var_dump($userInfo);
    }
}