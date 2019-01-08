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

        $channelLog = new OtherChannelLogger(["log" => new DateTime("now")], "info", "Hello Test");

        $event = new GlobalChannelEvent($channelLog);

        $dispatcher->addListener(Events::EVENT1, function (GlobalChannelEvent $event) {
            $event->getChannel()->onEvent();
        });


        $dispatcher->dispatch(Events::EVENT1, $event);
    }
}
