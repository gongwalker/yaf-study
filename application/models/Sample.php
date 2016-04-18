<?php
/**
 * @name SampleModel
 * @desc sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author gongwen
 */
class SampleModel extends Db_Mysql{
    public $tablename = 'user';
    public $pk = 'id';

    //构造方法(初始化操作)
    public function __construct() {
        //加表前缀
        $this->tablename = Comm_Tool::C('db.default.table_prefix').$this->tablename;
        //调用父类构造方法
        parent::__construct();
    }

    //指定id,得到某记录信息
    public function getUserInfo($id){
        $info = self::fRow($id);
        return $info;
    }

    public function selectSample() {
        return '从mvc中的m中来';
    }

    public function insertSample($arrInfo) {
        return true;
    }
}