<?php
/**
 * Created by PhpStorm.
 *
 * Date: 1/8/19
 * Time: 5:40 PM
 */

namespace Ipedis\Logger;


class OtherChannelLogger extends AbstractLogger implements ChannelInterface
{
    const NAME = "my_other_channel";
    private $context;
    private $level;
    private $message;

    function __construct($context, $level, $message)
    {
        $this->context = $context;
        $this->level = $level;
        $this->message = $message;
        parent::createLogger(self::NAME);
        parent::__construct();
    }

    /**
     * @override
     * @param $ctx
     */
    public function setContext($ctx)
    {
        $this->context = $ctx;
    }

    public function addCtx($ctx)
    {
        $this->context = array_merge($this->context, $ctx);
    }

    /**
     * @override
     * @param $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function onEvent()
    {
        parent::write($this->context, $this->level, self::NAME, $this->message);
    }
}