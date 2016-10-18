<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 18:46
 */
class MyClass
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';

    protected $protected = 'protected var';
    private   $private   = 'private var';

    function iterateVisible() {
        echo "MyClass::iterateVisible:\n";
        foreach($this as $key => $value) {
            print "$key => $value\n";
        }
    }
}

$class = new MyClass();

foreach($class as $key => $value) {
    print "$key => $value\n";
}
echo "\n";


$class->iterateVisible();

/*
    var1 => value 1
    var2 => value 2
    var3 => value 3

    MyClass::iterateVisible:
    var1 => value 1
    var2 => value 2
    var3 => value 3
    protected => protected var
    private => private var
 */