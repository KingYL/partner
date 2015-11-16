<?php
/**
 * Created by PhpStorm.
 * User: ´«Íú
 * Date: 2015/11/16
 * Time: 20:33
 */
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display("/index");
//        echo 123;
    }

    public function login(){
        $id =  $_POST['id'];
        $password = $_POST['password'];
        $User = M('user');
        $data['id'] = $id;
        $data['password'] = $password;
        $result  = $User->where(data)->select();
        echo $result;
    }

    public function register(){
        $User = M('user');
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
        return $User->add($data);
    }
}