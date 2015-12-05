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
        if($result[0] && password_verify($password,$result[0]["password"])){
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
        $data['password'] = password_hash(I('password'),PASSWORD_DEFAULT);
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
            $this->error("注册失败！","signUp",2);
        }
    }

    public function signOut(){
        session("userId", null);
        $this->redirect("Login/index");
    }

    public function insertExercise(){
        $exerciseTable = M("exercise_info");
        for($i = 0;$i < 500; $i++) {
            $data["date"] = date("Y-m-d", strtotime("2014-09-28 + " . $i . " day"));
            $data["uid"] = 1;
            $data["step_number"] = rand(2000, 15000);
            if (($data["step_number"] / 8000) > 1) {
                $data["complete_goal"] = 1;
            } else {
                $data["complete_goal"] = number_format($data["step_number"] / 8000, 2);
            }
            $data["meters"] = $data["step_number"] * 0.4;
            $data["calories"] = $data["step_number"] * 0.3;
            $data["steps"] = "{" . implode(",", $this->randnum($data["step_number"], 24,500)) . "}";
            $data["exercise_duration"] = rand(180, 540);
            $exerciseTable->add($data);
//        var_dump($data);
        }
    }

    public function insertSlumber(){
        $slumberTable = M("slumber_info");
        for($i = 0;$i < 300; $i++) {
            $data["date"] = date("Y-m-d", strtotime("2015-09-28 + " . $i . " day"));
            $data["uid"] = 1;
            $data["begin_time"] = $this->rand_time("20:00","23:59");
            $data["end_time"] = $this->rand_time("05:00","9:59");
            $data["slumber_time"] = 24*60 +  (strtotime($data["end_time"]) - strtotime($data["begin_time"]))/60;
            $data["info"] = "{" . implode(",", $this->randnum($data["slumber_time"], 24, 90)) . "}";
            $data["effective_rate"] = rand(0, 100)/100;
            $slumberTable->add($data);
        }
    }

    function rand_time($start_time,$end_time){

        $start_time = strtotime($start_time);
        $end_time = strtotime($end_time);
        return date('H:i', mt_rand($start_time,$end_time));
    }

    public function randnum($total1,$div1,$area1){
        $total = $total1; //待划分的数字
        $div = $div1; //分成的份数
        $area = $area1; //各份数间允许的最大差值
        $average = round($total / $div);
        $sum = 0;
        $result = array_fill( 1, $div, 0 );

        for( $i = 1; $i < $div; $i++ ){
            //根据已产生的随机数情况，调整新随机数范围，以保证各份间差值在指定范围内
            if( $sum > 0 ){
                $max = 0;
                $min = 0 - round( $area / 2 );
            }elseif( $sum < 0 ){
                $min = 0;
                $max = round( $area / 2 );
            }else{
                $max = round( $area / 2 );
                $min = 0 - round( $area / 2 );
            }
            //产生各份的份额
            $random = rand( $min, $max );
            $sum += $random;
            $result[$i] = $average + $random;
        }

        //最后一份的份额由前面的结果决定，以保证各份的总和为指定值
        $result[$div] = $average - $sum;
        foreach( $result as $temp ){
            if($temp < 0){
                $data[] = 0;
            }else {
                $data[] = $temp;
            }
        }
        return $data;
    }

}