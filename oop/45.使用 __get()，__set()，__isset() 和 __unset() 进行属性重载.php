<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 18:43
 */
/**
 * PHP所提供的"重载"（overloading）是指动态地"创建"类属性和方法。我们是通过魔术方法（magic methods）来实现的。
 * 当调用当前环境下未定义或不可见的类属性或方法时，重载方法会被调用。
 * 本节后面将使用"不可访问属性（inaccessible properties）"和"不可访问方法（inaccessible methods）"来称呼这些未定义或不可见的类属性或方法。
 * 所有的重载方法都必须被声明为 public。
 * 这些魔术方法的参数都不能通过引用传递。
 * 在给不可访问属性赋值时，__set() 会被调用。
 * 读取不可访问属性的值时，__get() 会被调用。
 * 当对不可访问属性调用 isset() 或 empty() 时，__isset() 会被调用。
 * 当对不可访问属性调用 unset() 时，__unset() 会被调用。
 * 参数 $name 是指要操作的变量名称。__set() 方法的 $value 参数指定了 $name 变量的值。
 * 属性重载只能在对象中进行。在静态方法中，这些魔术方法将不会被调用。所以这些方法都不能被 声明为 static。从 PHP 5.3.0 起, 将这些魔术方法定义为 static 会产生一个警告。
 */
class PropertyTest {
    /**  被重载的数据保存在此  */
    private $data = array();


    /**  重载不能被用在已经定义的属性  */
    public $declared = 1;

    /**  只有从类外部访问这个属性时，重载才会发生 */
    private $hidden = 2;

    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    /**  PHP 5.1.0之后版本 */
    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    /**  PHP 5.1.0之后版本 */
    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    /**  非魔术方法  */
    public function getHidden()
    {
        return $this->hidden;
    }
}


echo "<pre>\n";

$obj = new PropertyTest;

$obj->a = 1;
echo $obj->a . "\n\n";

var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo "\n";

echo $obj->declared . "\n\n";

echo "Let's experiment with the private property named 'hidden':\n";
echo "Privates are visible inside the class, so __get() not used...\n";
echo $obj->getHidden() . "\n";
echo "Privates not visible outside of class, so __get() is used...\n";
echo $obj->hidden . "\n";

/*
    Setting 'a' to '1'
    Getting 'a'
    1

    Is 'a' set?
    bool(true)
    Unsetting 'a'
    Is 'a' set?
    bool(false)

    1

    Let's experiment with the private property named 'hidden':
    Privates are visible inside the class, so __get() not used...
    2
    Privates not visible outside of class, so __get() is used...
    Getting 'hidden'


    Notice:  Undefined property via __get(): hidden in <file> on line 70 in <file> on line 29
 */