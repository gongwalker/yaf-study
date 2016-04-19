<?php

/**
 * @desc yaf框架 常量功能封封装为方法
 * User: gwalker
 * Date: 16/4/18
 * Time: 下午6:16
 */
class Comm_Tool
{
    /**
     * @desc yaf框架 model实例化函数
     * @author gwalker
     * @param $modelName
     * @return mixed
     */
    public static function M($modelName)
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
     * @desc yaf框架 获取其配置文件某节点值(PS:支持 ->分隔 或 .分隔)
     * @author gwalker
     * @param null $node
     * @return mixed
     * @demo C('application->directory') 或 C('application.directory')
     */
    public static function C($node = null)
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


    /**
     * @desc yaf框架 浏览器友好的变量输出
     * @param mixed $var 变量
     * @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
     * @param string $label 标签 默认为空
     * @param boolean $strict 是否严谨 默认为true
     * @return void|string
     */
    public static function dump($var, $echo = true, $label = null, $strict = true)
    {
        $label = (null === $label) ? '' : rtrim($label) . ' ';
        if (!$strict) {
            if (ini_get('html_errors')) {
                $output = print_r($var, true);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            } else {
                $output = $label . print_r($var, true);
            }
        } else {
            ob_start();
            var_dump($var);
            $output = ob_get_clean();
            if (!extension_loaded('xdebug')) {
                $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            }
        }
        if ($echo) {
            echo($output);
            return null;
        } else {
            return $output;
        }
    }


    /**
     * @desc yaf框架 创建多级目录(递归实现)
     * @author gwalker
     * @param $dir
     * @return bool
     */
    public static function mkdirs($dir, $mode = 0755){
        if (is_dir($dir) || mkdir($dir, $mode)) return TRUE;
        if (!self::mkdirs(dirname($dir), $mode)) return FALSE;
        return mkdir($dir, $mode);
    }
}

