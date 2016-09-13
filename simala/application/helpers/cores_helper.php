<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
if (! function_exists('ping')) {
	
	function ping($host,$port)
	{
		return @fsockopen($host, $port, $iErrno, $sErrStr, 1);
	}
}