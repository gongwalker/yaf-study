<?php
class IndexController extends Yaf_Controller_Abstract {
    public function indexAction() {
        //$info = Comm_Tool::C();
        //Comm_Tool::dump($info);
        //exit;


        $info = Comm_Tool::M('Sample')->getUserInfo(2);
        print_r($info);
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