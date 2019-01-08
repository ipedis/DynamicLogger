<?php
namespace Ipedis\Logger;

use DateTime;
use Symfony\Component\EventDispatcher\EventDispatcher;
/**
 * Created by PhpStorm.
 * User: digital14
 * Date: 1/8/19
 * Time: 3:14 PM
 */

class TestDispatch
{
    public function log()
    {
        $dispatcher = new EventDispatcher();

        $channelLog = new OtherChannelLogger(["log" => new DateTime("now")], "error", "Hello Test");

        $event = new GlobalChannelEvent($channelLog);

        $dispatcher->addListener('write.log', function (GlobalChannelEvent $event) {
            $event->getChannel()->onEvent();
        });


        $dispatcher->dispatch("write.log", $event);
    }
}
