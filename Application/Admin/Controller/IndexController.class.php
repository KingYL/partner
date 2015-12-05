<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
class IndexController extends Controller {
    public function index(){
        $this->display("Index/admin");
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

    public function new_activity(){
        $this->display("Index/new_activity");
    }

    public function users(){
        $this->display("Index/users");
    }

    public function apply(){
        $this->display("Index/apply");
    }

    public function activities(){
        $this->display("Index/activities");
    }

}