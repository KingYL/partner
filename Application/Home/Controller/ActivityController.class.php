<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;
use Think\Page;

class ActivityController extends Controller {
    public function index(){
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfo(session("userId"));
        $this->assign("user",$userInfo);

        $activityTable = M("activity");
        $list = $activityTable->order("post_time desc")->page($_GET['p'].',5')->select();
        $count = $activityTable->count();
        $page = new Page($count,5);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');
        $show = $page->show();

        $this->assign("list",$list);
        $this->assign("page",$show);
//        var_dump($list);
        $this->display("Index/activity");
    }
}