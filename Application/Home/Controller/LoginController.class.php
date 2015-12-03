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
        $this->display("Index/signin");
    }

    public function signUp(){
        $this->display("Index/register");
    }

    public function signIn(){
        $id =  $_POST['id'];
        $password = $_POST['password'];
        $User = M('user');
        $condition['id'] = $id;
        $result  = $User->where($condition)->select();
        if($result[0] && $result[0]["password"] == $password){
//            $this->assign("user", $result[0]);
            session("userId",$result[0]["uid"]);
            $this->redirect("Index/index");
        }else{
            $this->error("登录失败！请确认用户名或密码！");
        }
    }

    public function register(){
        $userModel = new UserModel();
        $data['uid'] = NULL;
        $data['id'] = I('id');
        $data['password'] = I('password');
        $data['name'] = I('name');
        $data['identify'] = "普通用户";
        $data['sign'] = I('sign');
        $data['gender'] = I('gender');
        $data['email'] = I('email');
        $data['birthday'] = I('birthday');
        $data['icon_url'] = I('icon_url');
        try{
            $userModel->addUser($data);
            $this->success("注册成功！","index",3);
        }catch(\Exception $e){
            if($e->getCode()==23000){
                $this->error("注册失败！","signUp",2);
            }
        }
    }

    public function signOut(){
        session("userId", null);
        $this->redirect("Login/index");
    }
}