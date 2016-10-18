<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 17:48
 */

/**
 * 范围解析操作符可以用于访问静态成员，类常量，还可以用于覆盖类中的属性和方法。
 */
class MyClass {
    const CONST_VALUE = 'A constant value';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE; // 自 PHP 5.3.0 起

echo MyClass::CONST_VALUE;