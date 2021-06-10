<?php
/**
 * Created by PhpStorm.
 * User: sunman
 * Date: 2018/6/13
 * Time: 下午4:09
 */

namespace app\admin\Controller;


class Category extends Base
{
     public function add(){
         $data = input('post.');
         //dump($data);
         if($data){
             $res = model('category')->ins($data);
             if($res){
	            $this->success('添加栏目成功');
		     }else{
		        $this->error('添加栏目失败');
		     }
         }
        return $this->fetch();

     }

     public function index(){

         $data = model('category')->where('status',1)->select();
         return $this->fetch('',['data' => $data]);
     }
}