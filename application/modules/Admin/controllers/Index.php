<?php
class IndexController extends Yaf_Controller_Abstract {
    public function indexAction() {
        echo 'admin->index->index';
    }

    public function testAction(){
        echo 'admin->index->test';
    }
}