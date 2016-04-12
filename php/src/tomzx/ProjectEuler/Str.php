<?php

namespace tomzx\ProjectEuler;

class Str
{
	/**
	 * @param string $string
	 * @param int    $iteration
	 * @return string
	 */
	public static function rotate($string, $iteration)
	{
		$length = strlen($string);
		$n = $iteration % $length;
		return substr($string, $n) . substr($string, 0, $n);
	}

	/**
	 * It's faster to use php strrev and compare the generated numbers/strings(more generic) than to compare the
	 * characters individually through a for loop.
	 *
	 * @param string $string
	 * @return bool
	 */
	public static function isPalindrome($string)
	{
		$reverse = strrev($string);
		return (string)$string === (string)$reverse;
	}
}
