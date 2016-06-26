<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;

use Think\Page;
use Think\Upload;

use Home\Common\Util as util;

class ActivityController extends CommonController {

    public function create () {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $imgUrl = $_POST['image'];
        $beginTime = $_POST['beginTime'];
        $endTime = $_POST['endTime'];

        if (!isset($title) || !isset($content) || !isset($imgUrl) ||
            !isset($beginTime) || !isset($endTime) ) {
            $this->ajaxReturn([
                    'result'=>0,
                    'errMsg'=>"参数缺失!",
                ]);
        }

        $newRecord = [
            'title'=>$title,
            'content'=>$content,
            'img_url'=>$imgUrl,
            'enter_amount'=>0,
            'post_time'=>date('Y-m-d H:i:s'),
            'begin_time'=>util\TimeUtil::getInstance()->convertToT($beginTime),
            'end_time'=>util\TimeUtil::getInstance()->convertToT($endTime),
        ];

        $id = M('activity')->add($newRecord);

        $data = [
            'result'=>$id
        ];

        $this->ajaxReturn($data);

    }

    public function modify () {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $imgUrl = $_POST['image'];
        $beginTime = $_POST['beginTime'];
        $endTime = $_POST['endTime'];

        $newRecord = [
            'title'=>$title,
            'content'=>$content,
            'img_url'=>$imgUrl,
            'begin_time'=>util\TimeUtil::getInstance()->convertToT($beginTime),
            'end_time'=>util\TimeUtil::getInstance()->convertToT($endTime),
        ];

        $result = M('activity')->where(['activity_id'=>$id])->save($newRecord);

        $this->ajaxReturn([
            'result'=>($result===false?0:1)
            ]);

    }



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

        $users = array();
        $this->display("Index/activity_unit");
    }

    public function newActivity(){
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
        $this->display("Index/new_activity");
    }

    public function addActivity(){
        $upload = new Upload();
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Application/Public/data/activity/'; // 设置附件上传根目录
        $upload->autoSub = false;
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            $activity["img_url"] = $info["image"]['savepath'].$info["image"]['savename'];
            $activity["title"] = I("title");
            $activity["content"] = I("content");
            $activity["post_time"] = date("Y-m-d H:i:s");
            $activity["is_end"] = 0;
            $activity["begin_time"] = I("begin_time");
            $activity["end_time"] = I("end_time");
            $activity["enter_amount"] = 0;
            $activityTable = M("activity");
            if($activityTable->add($activity)){
                $this->success("活动创建成功");
            }
        }
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
