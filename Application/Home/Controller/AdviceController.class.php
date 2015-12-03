<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;
class AdviceController extends Controller {
    public function index(){
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfo(session("userId"));
        $this->assign("user",$userInfo);
        if($userInfo["identify"] != "普通用户"){

        }
        $this->display("Index/advice");
    }

    public function getQuestions(){
        $questionTable = M("question");
        $questionCond["uid"] = session("userId");
        $this->ajaxReturn($questionTable->where($questionCond)->select());
    }

    public function getAdvices(){

    }

    public function question(){
        $questionTable = M("question");
        $question["uid"] = session("userId");
        $question["title"] = I("title");
        $question["content"] = I("content");
        $question["time"] = date("Y-m-d H:i:s");
        try{
            $questionTable->add($question);
            $this->ajaxReturn(1);
        }catch (\Exception $e){
            exit(0);
        }
    }
}