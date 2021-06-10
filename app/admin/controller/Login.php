<?php
/**
 * Created by PhpStorm.
 * User: sunman
 * Date: 2018/6/10
 * Time: 下午10:58
 */

namespace app\admin\Controller;


use think\Controller;

class Login extends Controller
{
    public function index(){
       if(session('name','','api')){
            $this->redirect(url('index/index'));
        }
        return $this->fetch();
    }

    public function check(){
        $login = input('post.');
        //dump($login);

        if($login['username'] != '' && $login['password'] != ''){
            $adminuser = model('adminuser')->where(['name'=>$login['username']])->find();
            $adminuser = $adminuser->toArray();
            if(!captcha_check($login['code'])){
                $this->error('验证码错误');
            }
            if(md5($login['password'].$adminuser['rand']) == $adminuser['password']){
                session('name',$adminuser,'api');
                $this->success("登陆成功",url('index/index'));
            }else{
                $this->error('用户名或密码错误');
            }
        }else{
            $this->error("请填写用户名或密码");
        }
    }

    public function logout(){
        session(null,'api');
        $this->success('退出成功',url('login/index'));
    }
}