<?php
/**
 * @desc 数据库tongji.tj_request表model类
 * @author gongwen
 */
class requestModel extends Db_Mysql{
    public $tablename = 'request';
    public $pk = 'id';

    //构造方法(初始化操作)
    public function __construct() {
        //加表前缀
        $this->tablename = Comm_Tool::C('db.tongji.table_prefix').$this->tablename;
        //调用父类构造方法
        parent::__construct('tongji');
    }

    //记录访问统计信息
    public function addRequest($map){
        $re = self::insert($map);
        return $re;
    }
}
