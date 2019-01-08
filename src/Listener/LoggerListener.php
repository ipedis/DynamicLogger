<?php
namespace Ipedis\Listener;

use Ipedis\Logger\GlobalChannelEvent;

/**
 * Created by PhpStorm.
 * User: digital14
 * Date: 1/8/19
 * Time: 4:27 PM
 */

class LoggerListener
{
    public function writeLog(GlobalChannelEvent $event)
    {
        die("listener");
        $event->getChannel()->onEvent();
    }
}