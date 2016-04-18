<?php

/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf_Bootstrap_Abstract{
    //设置配置文件
    public function _initConfig() {
        $config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set("config", $config);
    }

    //设置默认路由
    public function _initDefaultName(Yaf_Dispatcher $dispatcher) {
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }

    //初始化方法,定义yaf框架自动关闭模板加载 (wen.gong加)
    public function _initAutoRender(Yaf_Dispatcher $dispatcher){
        Yaf_Dispatcher::getInstance()->autoRender(FALSE);
    }

    //初始化方法,定义yaf框架的全局函数 (wen.gong加)
    public function _del_initComFun(){
        include APP_PATH.'/application/comfun/comfun.php';
    }

    //初始化路由规则
    public function _initRoute(Yaf_Dispatcher $dispatcher) {
        $router = Yaf_Dispatcher::getInstance()->getRouter();
        /**
         * 添加配置中的路由
         */
        $router->addConfig(Yaf_Registry::get("config")->routes);
    }
}
