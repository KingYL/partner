<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;
class HealthController extends Controller {
    public function index(){
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfo(session("userId"));
        $exerciseInfoTable = M("exercise_info");
        $slumberInfoTable = M("slumber_info");
        $condition["date"] = date("Y-m-d");
        $condition["uid"] = session("userId");
        $exerciseInfo = $exerciseInfoTable->where($condition)->select();
        if($exerciseInfo[0]){
            $userInfo["step_number"] = $exerciseInfo[0]["step_number"];
        }else {
            $userInfo["step_number"] = 0;
        }
        $slumberInfo = $slumberInfoTable->where($condition)->select();
        if($slumberInfo[0]){
            $time = $slumberInfo[0]["slumber_time"];
            $userInfo["slumber_time"] = (int)($time/60)."小时".($time - (int)($time/60)*60)."分";
        }else {
            $userInfo["slumber_time"] = "0小时0分";
        }
        $this->assign("user", $userInfo);
        $this->display("Index/health");
    }

    public function getExerciseInfo(){
        $exerciseInfoTable = M("exercise_info");
        $condition["date"] = I("date");
        $condition["uid"] = session("userId");
        $exerciseInfo = $exerciseInfoTable->where($condition)->select();
        if($exerciseInfo[0]) {
            $this->ajaxReturn($exerciseInfo[0]);
        }
        $this->ajaxReturn(0);
    }

    public function getSlumberInfo(){
        $slumberInfoTable = M("slumber_info");
        $condition["date"] = I("date");
        $condition["uid"] = session("userId");
        $slumberInfo = $slumberInfoTable->where($condition)->select();
        if($slumberInfo[0]) {
            $this->ajaxReturn($slumberInfo[0]);
        }
        $this->ajaxReturn(0);
    }

    public function saveBaseInfo(){
        $baseInfoTable = M("base_info");
        $baseInfo["uid"] = session("userId");
        $baseInfo["height"] = I("height");
        $baseInfo["weight"] = I("weight");
        $baseInfo["BMI"] = number_format($baseInfo["weight"]/pow($baseInfo["height"]/100,2),1);
        $this->ajaxReturn($baseInfoTable->save($baseInfo));
    }

    public function saveExerciseGoal(){
        $baseInfoTable = M("base_info");
        $baseInfo["uid"] = session("userId");
        $baseInfo["exercise_goal"] = I("goal");
        $this->ajaxReturn($baseInfoTable->save($baseInfo));
    }
}