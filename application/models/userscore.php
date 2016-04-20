<?php
/**
 * @desc 数据库maindb.hi_user表model类
 * @author gongwen
 */
class UserScoreModel extends Db_Mysql{
    public $tablename = 'userScore';
    public $pk = 'id';

    //构造方法(初始化操作)
    public function __construct() {
        //加表前缀
        $this->tablename = Comm_Tool::C('db.default.table_prefix').$this->tablename;
        //调用父类构造方法
        parent::__construct('default');
    }


    //添加用户
    public function addUserScore($map){
        $re = self::insert($map);
        return $re;
    }
}
