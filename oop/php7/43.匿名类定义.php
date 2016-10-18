<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 18:41
 */
class SomeClass {}
interface SomeInterface {}
trait SomeTrait {}

var_dump(new class(10) extends SomeClass implements SomeInterface {
    private $num;

    public function __construct($num)
    {
        $this->num = $num;
    }

    use SomeTrait;
});

/*
    object(class@anonymous)#1 (1) {
      ["Command line code0x104c5b612":"class@anonymous":private]=>
      int(10)
    }
 */