<?php

namespace tomzx\ProjectEuler;

class Str
{
	/**
	 * @param string $string
	 * @param int $iteration
	 * @return string
	 */
	public static function rotate($string, $iteration)
	{
		$length = strlen($string);
		$n = $iteration % $length;
		return substr($string, $n) . substr($string, 0, $n);
	}
}
