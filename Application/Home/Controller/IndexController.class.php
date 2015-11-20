<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
        $User = M("user");
        $condition["uid"] = session("userId");
        $userInfo = $User->where($condition)->select();
        $this->assign("user", $userInfo[0]);
        $this->display("Index/index");
    }
}