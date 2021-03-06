<?php
namespace Ipedis\Logger;

use Monolog\Logger;

class ChannelLogger extends AbstractLogger implements ChannelInterface
{
	const NAME = "my_prod";
	private $context;
	private $level;
	private $message;
	private $currentStep;

	function __construct(&$context, $level, $message)
	{
        $this->context = $context;

	    if (isset($context['step'])) {
            $this->currentStep = $context['step'];
            $context['step'] = $this->currentStep + 1;
        }
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

	public function getContext()
    {
        return $this->context;
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

	public function getLevel()
    {
        return $this->level;
    }

    public function getMessage()
    {
        return $this->message;
    }

	public function setMessage($message)
    {
        $this->message = $message;
    }

	public function onEvent()
	{
		parent::write($this->context, $this->level, self::NAME, $this->message);
	}

	public function addStep(\Closure $closure)
    {
        dump($closure);
        //$closure->next($this->context, $this->getLevel(), $this::NAME, $this->getMessage());
    }
}