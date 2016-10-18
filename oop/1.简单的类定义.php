<?php

/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 14:24
 */
class SimpleClass
{
    public $name = 'lys';

    public function echo_name()
    {
        echo $this->name;
    }
}
$a = new SimpleClass();
$a->echo_name();