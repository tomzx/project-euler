<?php

namespace tomzx\ProjectEuler;

use LogicException;

class Series
{
	/**
	 * @param int   $n  number of terms
	 * @param float $a1 first term value
	 * @param float $a2 last term value
	 * @return float
	 */
	public static function arithmetic($n, $a1, $a2)
	{
		if ($n < 0) {
			new LogicException('n cannot be negative.');
		}
		return $n * ($a1 * $a2) / 2;
	}

	/**
	 * @param float $r common ratio
	 * @param int   $n number of terms
	 * @param int   $a scale factor
	 * @return float
	 */
	public static function geometric($r, $n, $a = 1)
	{
		if ($r === 1) {
			new LogicException('r cannot be equal to 1.');
		}
		if ($n < 0) {
			new LogicException('n cannot be negative.');
		}
		return $a * (1 - pow($r, $n)) / (1 - $r);
	}
}
