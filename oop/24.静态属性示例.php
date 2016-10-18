<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 17:59
 */
/**
 * 声明类属性或方法为静态，就可以不实例化类而直接访问。静态属性不能通过一个类已实例化的对象来访问（但静态方法可以）。
 * 为了兼容 PHP 4，如果没有指定访问控制，属性和方法默认为公有。
 * 由于静态方法不需要通过对象即可调用，所以伪变量 $this 在静态方法中不可用。
 * 静态属性不可以由对象通过 -> 操作符来访问。
 * 用静态方式调用一个非静态方法会导致一个 E_STRICT 级别的错误。
 * 就像其它所有的 PHP 静态变量一样，静态属性只能被初始化为文字或常量，不能使用表达式。
 * 所以可以把静态属性初始化为整数或数组，但不能初始化为另一个变量或函数返回值，也不能指向一个对象。
 * 自 PHP 5.3.0 起，可以用一个变量来动态调用类。但该变量的值不能为关键字 self，parent 或 static。
 */
class Foo
{
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}

class Bar extends Foo
{
    public function fooStatic() {
        return parent::$my_static;
    }
}


print Foo::$my_static . "\n";

$foo = new Foo();
print $foo->staticValue() . "\n";
print $foo->my_static . "\n";      // Undefined "Property" my_static

print $foo::$my_static . "\n";
$classname = 'Foo';
print $classname::$my_static . "\n"; // As of PHP 5.3.0

print Bar::$my_static . "\n";
$bar = new Bar();
print $bar->fooStatic() . "\n";