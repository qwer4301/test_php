<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 17:45
 */
/**
 * 被定义为公有的类成员可以在任何地方被访问。
 * 被定义为受保护的类成员则可以被其自身以及其子类和父类访问。
 * 被定义为私有的类成员则只能被其定义所在的类访问。
 */
class Test
{
    private $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    private function bar()
    {
        echo 'Accessed the private method.';
    }

    public function baz(Test $other)
    {
        // We can change the private property:
        $other->foo = 'hello';
        var_dump($other->foo);

        // We can also call the private method:
        $other->bar();
    }
}

$test = new Test('test');

$test->baz(new Test('other'));