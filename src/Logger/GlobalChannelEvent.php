<?php
namespace Ipedis\Logger;

use Symfony\Component\EventDispatcher\Event;

class GlobalChannelEvent extends Event
{
	private $channelLog;

	public function __construct(ChannelInterface $channelLog)
	{
		$this->channelLog = $channelLog;
	}

	public function getChannel()
	{
		return $this->channelLog;
	}
}