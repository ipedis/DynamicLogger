<?php
/**
 * Created by PhpStorm.
 * User: digital14
 * Date: 1/8/19
 * Time: 4:42 PM
 */

require 'vendor/autoload.php';

$test = new Ipedis\Logger\TestDispatch();
$test->log();