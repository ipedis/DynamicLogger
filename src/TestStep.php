<?php
/**
 * Created by PhpStorm.
 *
 * Date: 1/9/19
 * Time: 9:16 AM
 */

namespace Ipedis;


use Ipedis\Closure\Step;
use Ipedis\Logger\ChannelInterface;

class TestStep
{
    /**
     * @var Step
     */
    private $step;
    function next(ChannelInterface $channel)
    {
        $this->step = new Step();
        $this->step->write($channel->getContext(), $channel->getLevel(), $channel::NAME, $channel->getMessage());
    }
}