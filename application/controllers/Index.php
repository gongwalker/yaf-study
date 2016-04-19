<?php
class IndexController extends Yaf_Controller_Abstract {
    public function indexAction() {
        //获取配置文件
        $info = Comm_Tool::C('db.default.dsn');
        Comm_Tool::dump($info);

        //读id为2用户的信息
        //$info = Comm_Tool::M('Sample')->getUserInfo(2);

        $info = Comm_Tool::M('Sample')->insert(array('name'=>'巩文'));
        Comm_Tool::dump($info);
        exit;


        //实便
        $model = new SampleModel();
        $info = $model->getUserInfo(2);
        echo '<pre>';
        print_r($info);
        echo '</pre>';



        echo '<hr>';

    }

    public function testAction(){
        $config = Yaf_Registry::get("config")->db->default;
        echo '<pre>';
        print_r($config);
        echo '<hr>';
        echo 'index->index->test';
    }
}