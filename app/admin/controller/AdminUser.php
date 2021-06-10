<?php
/**
 * Created by PhpStorm.
 * User: sunman
 * Date: 2018/6/10
 * Time: 下午9:48
 */

namespace app\admin\Controller;


//use think\Controller;

class AdminUser extends Base
{

    public function add(){
        $auser = input('post.');
        if($auser){
            $rand = rand(0,9999);
            $data = [
                'name' => $auser['username'],
                'rand' => $rand,
                'password' => md5($auser['password'].$rand),
                'status' => 1
            ];
           $adminuser = $this->obj;
           if($adminuser->save($data)){
               $this->success('添加管理员成功');
           }
        }else{
            return $this->fetch();
        }


    }

    public function index(){
        $data = $this->obj->field('id,name,is_sup,status,create_time')->where(['status' => ['neq',-1]])->select();
        return $this->fetch('',['data' => $data]);
    }

    public function edit(){
        $id = input('param.id');
        //echo $id;exit;
        $da = input('post.');
        if($id && !$da){
            $info = $this->obj->get($id);
            return $this->fetch('',['info' => $info]);
        }else if($id && $da){
            $rand = rand(0,9999);
            $data = [
                'name' => $da['username'],
                'password' => md5($da['password'].$rand),
                'rand' => $rand
            ];
            $ids = $this->obj->where(['id' => $id])->update($data);
            if($ids){
                return $this->success('修改成功');
            }else{
                return $this->error('更改失败');
            }
        }else{
            return $this->error('参数非法');
        }

    }
}