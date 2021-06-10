<?php
/**
 * Created by PhpStorm.
 * User: sunman
 * Date: 2018/6/13
 * Time: 下午4:17
 */

namespace app\common\model;


use think\Model;

class category extends Model
{
    public function ins($data){
    	//dump($data);exit;
        $res = $this->allowField(true)->save($data);
        //echo $this->getLastSql();exit;
        return $res;
    }
}