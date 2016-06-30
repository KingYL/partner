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
            $this->display("Index/advice_service");
        }else {
            $this->display("Index/advice");
        }
    }

    public function getQuestions(){
        $questionTable = M("question");
        $questionCond["uid"] = session("userId");
		$page = I('page');
		if (!isset($page))
			$page = 0;
		$result = pageQuery($questionTable->where($questionCond), $page, 10);
        $this->ajaxReturn($result);
    }

    public function getServiceQuestions(){
        $relationTable = M("relation");
        $condition["service_id"] = session("userId");
        $questions = $relationTable->where($condition)->join("question ON relation.uid=question.uid")->join("user ON question.uid=user.uid")->select();
        $this->ajaxReturn($questions);
    }

    public function getServiceAdvices(){
        $adviceTable = M("advice");
        $condition["from_user"] = session("userId");
        $advices = $adviceTable->query("SELECT Q.title,A.content,A.time FROM advice as A JOIN question as Q ON A.qid=Q.qid WHERE A.from_user=".session("userId"));
        $this->ajaxReturn($advices);
    }

    public function getAdvices(){
        $adviceTable = M("advice");
        $condition["to_user"] = session("userId");
		$page = I('page');
		if (!isset($page))
			$page = 0;
		$query = "SELECT Q.title,A.content,U.name,U.identify,A.time FROM advice as A JOIN 
			question as Q ON A.qid=Q.qid JOIN user as U ON A.from_user=U.uid WHERE A.to_user=".session("userId");
        $advices = pageQueryRaw($adviceTable, $query, $page, 10);
		$this->ajaxReturn($advices);
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

    public function replyQuestion(){
        $adviceTable = M("advice");
        $advice["qid"] = I("qid");
        $advice["content"] = I("content");
        $advice["to_user"] = I("to_user");
        $advice["from_user"] = session("userId");
        $advice["time"] = date("Y-m-d H:i:s");
        try{
            $this->ajaxReturn($adviceTable->add($advice));
        }catch (\Exception $e){
            $this->ajaxReturn(0);
        }
    }
}