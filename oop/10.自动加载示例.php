<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 17:02
 */
function __autoload($class_name) {
    require_once $class_name . '.php';
}

$obj  = new MyClass1();
$obj2 = new MyClass2();