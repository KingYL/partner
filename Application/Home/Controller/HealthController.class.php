<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;
class HealthController extends Controller {
    public function index(){
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfo(session("userId"));
        $this->assign("user", $userInfo);
        $this->display("Index/health");
    }
}