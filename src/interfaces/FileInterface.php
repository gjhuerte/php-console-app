<?php

namespace Acme\Interfaces;

interface FileInterface
{
	static function read();
	function loop();
	function write();
}