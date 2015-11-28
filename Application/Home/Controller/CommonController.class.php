<?php
/**
 * Created by PhpStorm.
 * User: ´«Íú
 * Date: 2015/11/28
 * Time: 23:40
 */
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller{
    public function _initialize(){
        if(!session('?userId')){
            $this->redirect("Login/index");
        }
    }
}