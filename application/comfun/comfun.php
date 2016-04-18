<?php
//框架的全局函数定义在此文件中

/**
 * @desc yaf框架 model实例化函数
 * @author gwalker
 * @param $modelName
 * @return mixed
 */
function M($modelName)
{
    static $_model = array();
    $className = $modelName . 'Model';
    $guid = md5($className);
    if (!isset($_model[$guid])) {
        $_model[$guid] = new $className();
    }
    return $_model[$guid];
}

/**
 * @desc yaf框架 获取其配置文件某节点值(支持 ->分隔 或 .分隔)
 * @author gwalker
 * @param null $node
 * @return mixed
 * @demo C('application->directory') 或 C('application.directory')
 */
function C($node = null)
{
    static $_config = array();
    if (!is_null($node)) {
        $node = '->' . str_replace('.', '->', $node);
    }
    $guid = md5($node);
    if (!isset($_config[$guid])) {
        eval('$_config["' . $guid . '"] = Yaf_Registry::get("config")' . $node . ';');
        if (is_object($_config[$guid])) {
            $_config[$guid] = $_config[$guid]->toArray();
        }
    }
    return $_config[$guid];
}

