<?php
namespace Ipedis\Logger;

interface ChannelInterface
{
	public function setContext($context);
	public function setLevel($level);
}