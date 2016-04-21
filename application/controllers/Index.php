<?php
class IndexController extends Yaf_Controller_Abstract {
    //model数据库操作封装测试
    public function indexAction() {
        $User = Comm_Tool::M('user');
        $User_Score =  Comm_Tool::M('userScore');




        $re = $User->modifyUser(['uid'=>12,'address'=>'vvv']);
        Comm_Tool::dump($re);



        exit;



        $info = $User->getUserInfo(2);
        Comm_Tool::dump($info);

        //访问统计
        /*
        $Request = Comm_Tool::M('request');
        $map = [
            'time'=>time(),
            'username'=>'李二'
        ];
        $re = $Request->addRequest($map);
        Comm_Tool::dump($re);
        */




        //添加用户
        $map = [
            'time'=>time(),
            'username'=>'张三丰'.rand(1,10),
            'address'=>'中国,北京,朝阳',
            'other'=>'李可'
        ];
        $re = $User->addUser($map);
        Comm_Tool::dump($re);



        //添加用户积分
        $map = [
            'uid' => 1,
            'score' => rand(10,100)
        ];

        $re = $User_Score->addUserScore($map);
        Comm_Tool::dump($re);



        //添加用户
        $map = [
            'time'=>time(),
            'username'=>'张三丰'.rand(1,10),
            'address'=>'中国,北京,朝阳',
            'other'=>'李可'
        ];
        $re = $User->addUser($map);
        Comm_Tool::dump($re);

        //addUserScore



        /*
        //访问统计
        $Request = Comm_Tool::M('request');
        $map = [
            'time'=>time(),
            'username'=>'李二'
        ];
        $re = $Request->addRequest($map);
        Comm_Tool::dump($re);
        */


    }

    //smarty测试
    public function smarty(){
        $this->getView()->assign("content", "hello smarty");
        $this->getView()->display('index/smarty.html');
    }


    //基本封装函数测试
    public function testAction(){
        $info = Comm_Tool::C('db.default.dsn');
        Comm_Tool::dump($info);
        echo 'index->index->test';
    }
}