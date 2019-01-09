<?php
/**
 * Created by PhpStorm.
 * Date: 1/8/19
 * Time: 4:42 PM
 */

require 'vendor/autoload.php';

/**
 * using event
 */
$test = new Ipedis\Logger\TestDispatch();
$test->log();

echo "Page loaded";

