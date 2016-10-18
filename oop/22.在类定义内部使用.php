<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 17:52
 */
/**
 * self，parent 和 static 这三个特殊的关键字是用于在类定义的内部对其属性或方法进行访问的。
 */
class MyClass {
    const CONST_VALUE = 'A constant value';
}
class OtherClass extends MyClass
{
    public static $my_static = 'static var';

    public static function doubleColon() {
        echo parent::CONST_VALUE . "\n";
        echo self::$my_static . "\n";
    }
}

$classname = 'OtherClass';
echo $classname::doubleColon(); // 自 PHP 5.3.0 起

OtherClass::doubleColon();