<?php

/**
 * Print out debug informations
 * @param mixed $value
 * @param bool  $stop
 * @return string echoed
 */
function D($value, $stop = false)
{
	echo '<pre>' . print_r($value, true) . '</pre>';

	if($stop) die();
}