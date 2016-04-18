<?php
class UserController extends Yaf_Controller_Abstract {
    public function indexAction() {//自定义的Action
        $this->getView()->assign("content", "index-user-index");
        $this->display('index');
    }

    public function testAction(){
        Yaf_Dispatcher::getInstance()->autoRender(FALSE);
        $this->getView()->assign("content", "index-user-test");
        $this->display('index');
    }
}