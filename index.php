<?php
/**
 * Created by PhpStorm.
 * Date: 1/8/19
 * Time: 4:42 PM
 */

require 'vendor/autoload.php';

$test = new Ipedis\Logger\TestDispatch();
$test->log();

$step = new \Ipedis\TestStep();
$step->next();

echo "Page loaded";

$greeting = function ($name) {
    return "Hello " . $name;
};

$greeting("Jess");
