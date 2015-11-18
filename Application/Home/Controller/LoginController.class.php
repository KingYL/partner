<?php
/**
 * Created by PhpStorm.
 * User: 传旺
 * Date: 2015/11/16
 * Time: 20:33
 */
namespace Home\Controller;
use Home\Model\UserModel;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        if(session('?username')){
            $this->display("Index/index");
        }else {
            $this->display("Index/signin");
        }
//        echo 123;
    }

    public function signUp(){
        $this->display("Index/register");
    }

    public function signIn(){
        $id =  $_POST['id'];
        $password = $_POST['password'];
        $User = M('user');
        $condition['id'] = $id;
//        $condition['password'] = $password;
        $result  = $User->where($condition)->select();
//        var_dump($result);
        $this->ajaxReturn($condition);
//        print_r($condition);
    }

    public function register(){
        $userModel = new UserModel();
        $data['uid'] = NULL;
        $data['id'] = I('id');
        $data['password'] = I('password');
        $data['name'] = I('name');
        $data['identity'] = I('identity');
        $data['sign'] = I('sign');
        $data['gender'] = I('gender');
        $data['email'] = I('email');
        $data['birthday'] = I('birthday');
        $data['icon_url'] = I('icon_url');
        return $userModel->addUser($data);
    }
}