<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/19
 * Time: 11:04
 */
// Declare a simple class
class TestClass
{
    public $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function __toString() {
        return $this->foo;
    }
}

$class = new TestClass('Hello');
echo $class;