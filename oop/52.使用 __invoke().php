<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/19
 * Time: 11:06
 */
class CallableClass
{
    function __invoke($x) {
        var_dump($x);
    }
}
$obj = new CallableClass;
$obj(5);
var_dump(is_callable($obj));