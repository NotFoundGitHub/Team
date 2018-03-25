<?php
namespace app\index\controller; 
use think\Controller;
use \think\Request; 
use \think\Db; 

class Index  extends Controller  {


    public function index() {
        //   网站首页
       return  view();

    }

    public function loginMid(){

        // 登录处理
        $req = request() -> param(); 
        $res =  Db::table('user')->where('sid',$req['sid'])->where('password',$req['password'])->find(); 
        // 查询不到账号，或者密码错误，重回登录页
        if(count($res) == 0) {
            return $this->redirect('login');
        }else{
        // 如果已经登录，获得学号，并重定向到首页
            session('login',$req['sid']);
            return $this->redirect('index');
        }
        

    }
    // 注册处理
    public function regMid(){

        $req = request() -> param(); 
        $res =  Db::table('user')->insert($req); 

        // 获得网页传来的参数传入数据库 成功后跳转到登录页面

        $this->redirect('login');
     

    }





    public function meJoin() {

        // 查询我加入的
        if(!session('login')){
            // 如果没登录，跳转到登录页面
            $this->redirect('/team/public/index/index/login');
        }
           
        // 查询活动详情表中该账号的情况
        $res =  Db::table('detail')->where('sid',session('login'))->select();
        
        $arr = array();

        // 获得活动id，从队伍列表中查询对应的活动
        for($i=0;$i<count($res);$i++){
           
             $arr=  Db::table('team')->where('tid',$res[$i]['tid'])->select();  
 
        }

        // dump($arr);

        $this->assign('arr',$arr);
        return $this->fetch('meJoin');


    }
    public function joinMe() {

        // 加入我的
        if(!session('login')){
            // 未登录跳转
            $this->redirect('/team/public/index/index/login');
        }else{

        // 查询我创建的队伍信息
        $res =  Db::table('team')->where('sid',session('login'))->select();
       
        $arr = array();

        // 获得队伍id后去详情表查询含有此团队id的人
        for($i=0;$i<count($res);$i++){  
            if((Db::table('detail')->where('tid',$res[$i]['tid'])->select())!=null){
                $arr[$i] =  Db::table('detail')->where('tid',$res[$i]['tid'])->find();
                
                // 获得活动名
                $arr[$i]['actName'] =  Db::table('actList')->where('actId',$res[$i]['aid'])->column('actName');
                // 获得活动结束时间
                $arr[$i]['endTime'] =  Db::table('actList')->where('actId',$res[$i]['aid'])->column('endTime');
            }
        }
        // dump($arr);
        $this->assign('arr',$arr);
        return $this->fetch('joinMe');
        }

    }

    public function login() {
        return view('login'); 
    }
    public function reg() {
        return view('reg'); 
    }


}
