<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 18:42
 */
/**
 * 匿名类被嵌套进普通 Class 后，不能访问这个外部类（Outer class）的 private（私有）、protected（受保护）方法或者属性。
 * 为了访问外部类（Outer class）protected 属性或方法，匿名类可以 extend（扩展）此外部类。
 * 为了使用外部类（Outer class）的 private 属性，必须通过构造器传进来：
 */
class Outer
{
    private $prop = 1;
    protected $prop2 = 2;

    protected function func1()
    {
        return 3;
    }

    public function func2()
    {
        return new class($this->prop) extends Outer {
            private $prop3;

            public function __construct($prop)
            {
                $this->prop3 = $prop;
            }

            public function func3()
            {
                return $this->prop2 + $this->prop3 + $this->func1();
            }
        };
    }
}

echo (new Outer)->func2()->func3(); //6