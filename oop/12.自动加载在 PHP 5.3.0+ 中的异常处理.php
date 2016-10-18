<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/18
 * Time: 17:04
 */
function __autoload($name) {
    echo "Want to load $name.\n";
    throw new Exception("Unable to load $name.");
}

try {
    $obj = new NonLoadableClass();
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}