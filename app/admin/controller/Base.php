<?php
/**
 * Created by PhpStorm.
 * User: sunman
 * Date: 2018/6/10
 * Time: 下午11:05
 */

namespace app\admin\Controller;


use think\Controller;

class Base extends Controller
{
    public $obj;
    public $cate;
    public function _initialize()
    {
        $this->cate = model('category')->field('name,id')->where('status',1)->select();
        $this->obj = model('adminuser');
        if(session('name','','api') == null){
            $this->redirect('login/index');
        }
    }
}