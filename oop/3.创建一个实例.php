<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 16:44
 */
$instance = new SimpleClass();

// 也可以这样做：
$className = 'Foo';
$instance = new $className(); // Foo()