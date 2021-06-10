<?php
/**
 * Created by PhpStorm.
 * User: sunman
 * Date: 2018/6/7
 * Time: 下午11:07
 */
namespace app\admin\Controller;
//use think\controller;

class Index extends Base{
    public function index(){
        $info = session('name','','api');
        //dump($info);
        return $this->fetch('',['info' => $info]);
    }

    public function welcome(){
        return "欢迎登陆";
    }
}