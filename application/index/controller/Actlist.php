<?php
namespace app\index\controller; 
use think\Controller;
use \think\Request; 
use \think\Db; 

// 活动处理控制器


class Actlist extends Controller {

    public function index(){

        return "Hello";
    }


    public function mid(){

        $req = request() -> param(); 
        $time = $req['endTime']; 
        $isEnd = 0; 
        // 判断活动是否结束
        if (strtotime(date('Y-m-d')) > strtotime($time)) {
            $isEnd = 1; 
        }
        
        //新增活动插入数据库
        $req['actId'] = null;
        $req["isEnd"] =$isEnd;
        $res =  Db::table('actList')->insert($req); 
        // 处理结束返回活动列表
        $this->redirect('actList');
        

      


    }

    public function add_act() {  
        // 增加活动
        return view('add_act'); 
    }


    public function actList() {
        // 活动列表
        // 查询数据库获得活动列表
        
        $res = Db::table('actList')->where('isEnd',0)->select(); 
        $resSize  = count($res);

        // 传入数据
        $this->assign('res',$res);
        return $this->fetch('actList');


    }

}