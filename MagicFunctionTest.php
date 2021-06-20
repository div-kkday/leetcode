<?php

class MagicFunctionTest {
    public function __isset($name)
    {
        echo "__isset is called\n";
    }

    public function __get($name)
    {
        echo "__get is called\n";
    }

    public function __set($name, $value)
    {
        echo "__set is called\n";
    }

    public function __call($name, $arguments)
    {
        echo "__call is called\n";
    }

    public static function __callStatic($name, $arguments)
    {
        echo "__callStatic is called\n";
    }
}

$test = new MagicFunctionTest();

// trigger __isset
isset($test->aaa);

// trigger __get
$test->aaa;

// trigger __set
$test->aaa = 'value';

// trigger __call
$test->aaa('value');

// trigger __callStatic
MagicFunctionTest::aaa('value');
