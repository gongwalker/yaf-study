<?php
//APP_PATH是public目录的上一级,绝对路径
define("APP_PATH",  realpath(dirname(__FILE__) . '/../'));
$app  = new Yaf_Application(APP_PATH . "/conf/application.ini");
$app->bootstrap()->run();