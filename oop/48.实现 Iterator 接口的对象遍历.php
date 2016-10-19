<?php
/**
 * Created by PhpStorm.
 * User: liuyusheng
 * Date: 2016/10/19
 * Time: 10:47
 */
class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind() {
        echo "rewinding\n";
        reset($this->var);
    }

    public function current() {
        $var = current($this->var);
        echo "current: $var\n";
        return $var;
    }

    public function key() {
        $var = key($this->var);
        echo "key: $var\n";
        return $var;
    }

    public function next() {
        $var = next($this->var);
        echo "next: $var\n";
        return $var;
    }

    public function valid() {
        $var = $this->current() !== false;
        echo "valid: {$var}\n";
        return $var;
    }
}

$values = array(1,2,3);
$it = new MyIterator($values);

foreach ($it as $a => $b) {
    print "$a: $b\n";
}

/*
    rewinding
    current: 1
    valid: 1
    current: 1
    key: 0
    0: 1
    next: 2
    current: 2
    valid: 1
    current: 2
    key: 1
    1: 2
    next: 3
    current: 3
    valid: 1
    current: 3
    key: 2
    2: 3
    next:
    current:
    valid:
 */