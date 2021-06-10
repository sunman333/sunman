<?php
/**
 * Created by PhpStorm.
 * User: sunman
 * Date: 2018/6/12
 * Time: 下午4:14
 */

namespace app\admin\Controller;


class News extends Base
{

    public function index(){
        //$cate =
        return $this->fetch('',['cate' => $this->cate]);
    }

    public function add(){
        return $this->fetch('',['cate' => $this->cate]);
    }
}