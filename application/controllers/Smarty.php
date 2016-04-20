<?php
/**
 * smarty模板测试访问地址 http://yourdomain/smarty/smarty
 */
class SmartyController extends Yaf_Controller_Abstract {
    public function smartyAction()
    {
        $this->getView()->assign("content", "hello smarty");
        $this->getView()->display('smarty/smarty.html');
    }
}