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
        return $userTable->add($user);
    }

    public function getUserInfo($uid){
        $userTable = M('user');

    }
}