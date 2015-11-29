<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
    protected $tableName = "user";

    public function addUser($user){
        $userTable = M('user');
        if(!($user['id'] && $user['password'])){
            $this->error("输入信息不完整，请检查输入！");
        }
        $isAdded = $userTable->add($user);
        if($isAdded) {
            $condition["id"] = $user["id"];
            $user = $userTable->where($condition)->select();
            $userBaseInfo["uid"] = $user[0]["uid"];
            $userBaseInfo["height"] = 0;
            $userBaseInfo["weight"] = 0;
            $userBaseInfo["BMI"] = 0;
            $userBaseInfo["enter_time"] = date('Y-m-d');
            $userBaseInfo["exercise_amount"] = 0;
            $userBaseInfo["exercise_goal"] = 0;
            $userBaseInfo["slumber_amount"] = 0;
            $baseInfoTable = M("base_info");
            $isAdded = $baseInfoTable->add($userBaseInfo);
        }
        return isAdded;
    }

    public function getUserInfo($uid){
        $userTable = M('user');
        $condition["uid"] = $uid;
        $userInfo = $userTable->where($condition)->select()[0];

        $baseInfoTable = M("base_info");
        $baseInfo = $baseInfoTable->where($condition)->select();
        $userInfo["height"] = $baseInfo[0]["height"];
        $userInfo["weight"] = $baseInfo[0]["weight"];
        $userInfo["BMI"] = $baseInfo[0]["bmi"];
        $userInfo["enter_time"] = $baseInfo[0]["enter_time"];
        $userInfo["exercise_amount"] = $baseInfo[0]["exercise_amount"];
        $userInfo["exercise_goal"] = $baseInfo[0]["exercise_goal"];
        $userInfo["slumber_amount"] = $baseInfo[0]["slumber_amount"];
        return $userInfo;
    }

    public function updateUser($userInfo){
        $userTable = M("user");
        return $userTable->save($userInfo);
    }
}