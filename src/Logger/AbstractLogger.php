<?php
namespace Ipedis\Logger;
use Monolog\Logger;

abstract class AbstractLogger {

    const ERROR = "error";
    const DEBUG = "debug";
    const INFO = "info";
    /**
     * @var Logger
     */
	private $logger;

	private $channel;

	public function __construct()
	{

	}

	abstract function onEvent();

    /**
     * TODO handle all possible level
     * @param array $context
     * @param string $level
     * @param string $channel_name
     * @param $message
     * @throws \Exception
     */
	public function write($context, $level, $channel_name, $message)
	{
	    $this->channel = $channel_name;
	    if ($this->logger == null) {
	        $this->createLogger($channel_name);
        }
		switch ($level) {
			case self::INFO:
				$this->writeInfo($context, $message);
				break;
            case self::ERROR:
                $this->writeError($context, $message);
                break;
            case self::DEBUG:
                $this->writeDebug($context, $message);
                break;
			default:
				# code...
				break;
		}
	}

	private function writeInfo($context, $message)
    {
        $this->logger->info($message, $context);
    }

    private function writeError($context, $message)
    {
        $this->logger->error($message, $context);
    }


    private function writeDebug($context, $message)
    {
        $this->logger->debug($message, $context);
    }

    /**
     * Create new logger depending on the channel in parameters
     * @param $channel
     * @throws \Exception
     */
    public function createLogger($channel)
    {
        $this->channel = $channel;
        $this->logger = new Logger($channel);
        $this->logger->pushHandler(new \Monolog\Handler\StreamHandler(__DIR__.'/var/'.$this->channel . '.log', Logger::INFO));
    }
}