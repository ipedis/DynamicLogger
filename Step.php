<?php
/**
 * log every step of a process
 */
class Step implements LoggerInterface
{
	public function move($context, $channel, $level, $message)
	{
		// write log to channel $channel with level $level according to context $context
	}
}