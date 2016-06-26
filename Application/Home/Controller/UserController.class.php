<?php
namespace Home\Controller;
use Home\Model\UserModel;
use Think\Controller;
use Think\Upload;

class UserController extends CommonController {

    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function user(){
        $userModel = new UserModel();

        $userId = session("userId");
        $userInfo = $userModel->getUserInfo($userId);
        $this->assign("user", $userInfo);
        if (I("userId") && I("userId") != $userId) {
            $otherUserId = I("userId");
            $otherUser = $userModel->getUserInfo($otherUserId);
            $this->otherUser = $otherUser;
            $this->display("Index/otherUser");
        } else {
            $this->display("Index/user");
        }
    }

    public function save(){
        $userInfo["name"] = $_POST["name"];
        $userInfo["gender"] = $_POST["gender"];
        $userInfo["birthday"] = $_POST["birthday"];
        $userInfo["email"] = $_POST["email"];
        $userInfo["sign"] = $_POST["sign"];
        $userInfo["uid"] = $_POST["uid"];
        $userModel = new UserModel();
        $this->ajaxReturn($userModel->updateUser($userInfo));
    }

    public function uploadIcon(){
        $upload = new Upload();
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Application/Public/data/'; // 设置附件上传根目录
        $upload->autoSub = false;
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            $userInfo["uid"] = session("userId");
            $userInfo["icon_url"] = $info["icon_url"]['savepath'].$info["icon_url"]['savename'];
            $userModel = new UserModel();
            $userModel->updateUser($userInfo);
            $this->success('上传成功！');
        }
    }

    public function searchUser(){
        $condition["name"] = array("like","%".I("userName")."%");
        $condition["uid"] = array("neq", session("userId"));
        $userModel = new UserModel();
        $this->ajaxReturn($userModel->search($condition));
    }

    public function applyService(){
        $relationTable = M("relation");
        $relation["uid"] = session("userId");
        $relation["service_id"] = I("serviceId");
        try{
            $relationTable->add($relation);
            exit("1");
        }catch(\Exception $e){
            if($e->getCode()==23000){
                exit();
            }
        }
    }

    public function getMyRelations(){
        $relationTable = M("relation");
        $userModel = new UserModel();
        $result = array();
        $relationCond["uid"] = session("userId");
        $relation = $relationTable->where($relationCond)->select();
        foreach($relation as $relCell){
            $userCond["uid"] = $relCell["service_id"];
            $userCond["identify"] = I("type");
            $user = $userModel->where($userCond)->select();
            if($user[0]){
                $result[] = $user[0];
            }
        }
        $this->ajaxReturn($result);
    }

    public function getMyServiceUsers(){
        $relationTable = M("relation");
        $userModel = new UserModel();
        $result = array();
        $relationCond["service_id"] = session("userId");
        $relation = $relationTable->where($relationCond)->select();
        foreach($relation as $relCell){
            $userCond["uid"] = $relCell["uid"];
            $userCond["identify"] = "普通用户";
            $user = $userModel->where($userCond)->select();
            if($user[0]){
                $result[] = $user[0];
            }
        }
        $this->ajaxReturn($result);
    }
}
