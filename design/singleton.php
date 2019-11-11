<?php

/**
 * Class Db
 * 目的：保证一个类有且仅有一个实例，并且提供一个访问方法
 * 主要解决：实例频繁创建和销毁的资源问题
 * 何时使用：控制实例数量，节省资源
 * 如何实现：三私一公（私有化实例属性 私有化构造方法 私有化clone方法 公有化获取实例方法）
 * 关键代码：获取实例方法，判断实例是否存在
 * 应用场景：网站计数器、日志模块
 * 优点：有且仅有一个实例，减少了内存开销
 * 缺点：扩展性差、职责过重，在一定程度上；违背了单一职责
 *  滥用单例将带来一些负面的问题，如为了节省资源将数据库连接池对象设计为单例模式，
 *  可能会导致共享连接池对象的程序过多未出而出现的连接池溢出，
 *  如果实例化对象长时间不用系统就会被认为垃圾对象被回收，这将导致对象状态丢失。
 */
class Db{
    // 私有化成员属性
    private static $_instance;
    
    // 私有化构造方法 防止被实例化
    private function __construct()
    {
    
    }
    
    // 私有化clone方法 防止被clone
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    
    // 开发获取实例方法
    public static function getInstance() {
        if(empty(self::$_instance)) {
            self::$_instance = new self();
    
        }
        return self::$_instance;
    }
}

$obj1 = Db::getInstance();
$obj2 = Db::getInstance();

var_dump($obj1);
var_dump($obj2);