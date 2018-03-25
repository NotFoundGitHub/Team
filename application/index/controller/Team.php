<?php
namespace app\index\controller; 
use think\Controller;
use \think\Request; 
use \think\Db; 



class Team extends Controller {

    
    public function index(){
    
        echo "hello";
    //   dump($this->actId) ;

    }


    public function mid($aid){

        // 增加队伍处理过程
        $req = request() -> param(); 
        $req['tid'] = null;
        $res =  Db::table('team')->insert($req); 
        // 插入完成后返回队伍列表
        $backUrl = '/team/public/index/team/userList/'.'id/'.$aid;
        $this->redirect($backUrl);
     
        
        // //新增活动插入数据库
        // $req['actId'] = null;
        // $req["isEnd"] =$isEnd;
        // $res =  Db::table('actList')->insert($req); 
        // $this->redirect('actList');
        


    }
       
    public function add_team($aid) {
        if(!session('login')){
            // 未登录定位到登录界面
            $this->redirect('/team/public/index/index/login');
        }
        
        $this->assign('aid',$aid);
        return $this->fetch('add_team');

    }

    public function detail($aid,$tid) {
        // 详情页面
        $endTime = Db::table('actList')->where('actId',$aid)->column('endTime'); 
        // 查询活动结束时间
        $this->assign('endTime',$endTime[0]);
        $this->assign('aid',$aid);
        $this->assign('tid',$tid);
        $res = Db::table('team')->where('tid',$tid)->find(); 
        $this->assign('res',$res);     
        return $this->fetch('detail');

    }


    public function userList($id) {

        if(!session('login')){
            // 未登陆跳转到登录页面
            $this->redirect('/team/public/index/index/login');
        }

        $this->assign('aid',$id);

        $res = Db::table('team')->where('aid',$id)->select(); 
        $this->assign('res',$res);

        return $this->fetch('userList');

        // $res = Db::table('actList')->where('isEnd',0)->select(); 
        // $resSize  = count($res);
        // $this->assign('res',$res);
        // return $this->fetch('actList');
        // return view('userList'); 

    }
    public function join($aid,$tid){

        // 加入队伍处理逻辑
        if(!session('login')){

            $this->redirect('/team/public/index/index/login');
        }
        $res = Db::table('user')->where('sid',session('login'))->find();
        unset($res['password']);  
        
        // 获得传入的活动id和队伍id，连同个人信息一起插入活动列表

        $res['aid'] =$aid;
        $res['tid'] =$tid;

        Db::table('detail')->insert($res); 

        $backUrl = '/team/public/index/index/meJoin/';

        $this->redirect($backUrl);




    }









}