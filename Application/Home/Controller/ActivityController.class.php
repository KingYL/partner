<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;
use Think\Page;

class ActivityController extends CommonController {
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

    public function activity(){
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfo(session("userId"));
        $this->assign("user",$userInfo);

        $activityTable = M("activity");
        $condition["activity_id"] = I("ac");
        $activity = $activityTable->where($condition)->select()[0];
        $r_acticity_userTable = M("r_activity_user");
        $rCond["activity_id"] = $activity["activity_id"];
        $rCond["uid"] = session("userId");
        if($r_acticity_userTable->where($rCond)->select()[0]){
            $activity["is_enter"] = 1;
        }else {
            $activity["is_enter"] = 0;
        }
        $this->assign("activity",$activity);
        $this->display("Index/activity_unit");
    }

    public function enterActivity(){
        $r_acticity_userTable = M("r_activity_user");
        $relation["activity_id"] = I("activity_id");
        $relation["uid"] = session("userId");
        try{
            $r_acticity_userTable->add($relation);
            $activityTable = M("activity");
            $activityTable->execute("UPDATE activity SET enter_amount=enter_amount+1 WHERE activity_id=".I("activity_id"));
            $this->ajaxReturn(1);
        }catch (\Exception $e){
            $this->ajaxReturn(0);
        }
    }

    public function exitActivity(){
        $r_acticity_userTable = M("r_activity_user");
        $relation["activity_id"] = I("activity_id");
        $relation["uid"] = session("userId");
        try{
            $r_acticity_userTable->where($relation)->delete();
            $activityTable = M("activity");
            $activityTable->execute("UPDATE activity SET enter_amount=enter_amount-1 WHERE activity_id=".I("activity_id"));
            $this->ajaxReturn(1);
            $this->ajaxReturn(1);
        }catch (\Exception $e){
            $this->ajaxReturn(0);
        }
    }
}