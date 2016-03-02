<?php

namespace tomzx\ProjectEuler;

class Math
{
	/**
	 * @param int $n
	 * @return int
	 */
	public static function factorial($n)
	{
		$result = 1;
		for ($i = $n; $i > 1; --$i) {
			$result *= $i;
		}
		return $result;
	}

	/**
	 * @param array $primes
	 * @return int
	 */
	public static function divisorsSum(array $primes)
	{
		$sum = 1;
		foreach ($primes as $prime => $count) {
			$sum *= Series::geometric($prime, $count + 1);
		}
		return $sum;
	}

	/**
	 * @param int $n
	 * @param int $k
	 * @return int
	 */
	public static function combination($n, $k)
	{
		return Math::factorial($n) / (Math::factorial($k) * Math::factorial($n - $k));
	}
}
