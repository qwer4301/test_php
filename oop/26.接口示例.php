<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 18:19
 */
/**
 * 使用接口（interface），可以指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容。
 * 接口是通过 interface 关键字来定义的，就像定义一个标准的类一样，但其中定义所有的方法都是空的。
 * 接口中定义的所有方法都必须是公有，这是接口的特性。
 * 要实现一个接口，使用 implements 操作符。类中必须实现接口中定义的所有方法，否则会报一个致命错误。类可以实现多个接口，用逗号来分隔多个接口的名称。
 *
 * 要实现一个接口，使用 implements 操作符。类中必须实现接口中定义的所有方法，否则会报一个致命错误。
 * 类可以实现多个接口，用逗号来分隔多个接口的名称。
 * 实现多个接口时，接口中的方法不能有重名。
 * 接口也可以继承，通过使用 extends 操作符。
 * 类要实现接口，必须使用和接口中所定义的方法完全一致的方式。否则会导致致命错误。
 */
// 声明一个'iTemplate'接口
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}


// 实现接口
// 下面的写法是正确的
class Template implements iTemplate
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}

// 下面的写法是错误的，会报错，因为没有实现 getHtml()：
// Fatal error: Class BadTemplate contains 1 abstract methods
// and must therefore be declared abstract (iTemplate::getHtml)
class BadTemplate implements iTemplate
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
}