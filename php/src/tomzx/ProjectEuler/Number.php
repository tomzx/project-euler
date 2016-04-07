<?php

namespace tomzx\ProjectEuler;

class Number
{
	/**
	 * @param int $n
	 * @return float
	 */
	public static function triangle($n)
	{
		return $n * ($n + 1) / 2;
	}

	/**
	 * @param int $n
	 * @return float
	 */
	public static function pentagonal($n)
	{
		return $n * (3 * $n - 1) / 2;
	}

	/**
	 * @param int $n
	 * @return mixed
	 */
	public static function hexagonal($n)
	{
		return $n * (2 * $n - 1);
	}
}
