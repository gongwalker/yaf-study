<?php
/**
 * @desc 数据库maindb.hi_user表model类
 * @author gongwen
 */
class UserModel extends Db_Mysql{
    public $tablename = 'user';
    public $pk = 'uid';

    //构造方法(初始化操作)
    public function __construct() {
        //加表前缀
        $this->tablename = Comm_Tool::C('db.default.table_prefix').$this->tablename;
        //调用父类构造方法
        parent::__construct('default');
    }

    //指定id,得到某用户信息
    public function getUserInfo($id){
        $info = self::fRow($id);
        return $info;
    }

    //添加用户
    public function addUser($map){
        $re = self::insert($map);
        return $re;
    }

    //修改用户
    public function modifyUser($map){
        $where = ['uid'=>1,'name'=>'阿三'];
        //$where = 'uid=1 and name="阿三"';

        $where = ['uid'=>array('neq','1,3'),'name'=>'阿三'];

        $where = ['uid'=>array('=','1,3'),'name'=>'阿三'];

        $where = ['uid'=>array('in','1,3'),'name'=>'阿三'];

        $where = ['name'=>'李二','uid'=>array('not between','1,3'),'age'=>array('in',array(2,5))];


        $where = ['uid'=>array('in',array(1,3,5)),'name'=>'阿三'];

        //$where = ['uid' => array('exp','IN(3,4,5)')];



        //需要在查询的时候同时偶尔使用字符串却又不希望丢失数组方式的灵活的话，可以考虑使用组合查询
        $where = ['uid'=>array('in',array(6,7)),'_string'=>'(name = "李安" OR age=10)'];

        //like
        $where = ['name'=>array('LIKE','%a%')];


        $where = ['uid'=>1,'name'=>'阿三'];

        //$re = self::where($where)->update($map);
        //$re = self::where('uid=2')->update($map);
        //$re = self::where('uid=90')->del();
        //$re = self::where($where)->update($map);

        //没有where不执行
        $re = self::update(array('username'=>'v'));
        return $re;
    }
}
