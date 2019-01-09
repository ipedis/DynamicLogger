<?php
namespace Ipedis\Logger;

use DateTime;
use Symfony\Component\EventDispatcher\EventDispatcher;
/**
 * Created by PhpStorm.
 *
 * Date: 1/8/19
 * Time: 3:14 PM
 */

class TestDispatch
{
    public function log()
    {
        $dispatcher = new EventDispatcher();
        // initialize context with step = 1
        $context = ['task_id' => uniqid('task_'), 'step' => 1];

        //create first channel logger
        $channelLog = new ChannelLogger($context, "info", "First step");
        $event = new GlobalChannelEvent($channelLog);

        $dispatcher->addListener(Events::EVENT1, function (GlobalChannelEvent $event) {
            $event->getChannel()->onEvent();
        });

        // create second channel logger
        $otherLog = new ChannelLogger($context, "info", "Next step");
        $event2 = new GlobalChannelEvent($otherLog);

        $dispatcher->addListener(Events::EVENT2, function (GlobalChannelEvent $event) {
            $event->getChannel()->onEvent();
        });

        $dispatcher->addListener(Events::ERROR, function (GlobalChannelEvent $event) {
            $event->getChannel()->onEvent();
        });

        // dispatch first event [step = 1]
        $dispatcher->dispatch(Events::EVENT1, $event);

        // dispatch event [automatically step = 2]
        $dispatcher->dispatch(Events::EVENT2, $event2);

        /**
         * Manually create exception
         * Exception will automatically get the current step when Exception is thrown
         */
        try {
            throw new \Exception("Unable to terminate process");
        } catch (\Exception $exception) {
            $errorLog = new ExceptionLogger($context);
            $errorEvent = new GlobalChannelEvent($errorLog);
            $dispatcher->dispatch(Events::ERROR, $errorEvent);
        }

    }
}
