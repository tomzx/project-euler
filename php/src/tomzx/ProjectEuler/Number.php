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

	/**
	 * @param int $n
	 * @return string
	 */
	public static function getProperDivisorsType($n)
	{
		$sum = array_sum(self::getProperDivisors($n));
		if ($sum > $n) {
			return 'abundant';
		} elseif ($sum < $n) {
			return 'deficient';
		} else {
			return 'perfect';
		}
	}

	/**
	 * @param int $n
	 * @return array
	 */
	public static function getProperDivisors($n)
	{
		$divisors = [];
		$max = ceil($n/2);
		for ($i = 1; $i <= $max; ++$i) {
			if ($n % $i === 0) {
				$divisors[] = $i;
			}
		}
		return $divisors;
	}

	public static function getDivisorsCount($n)
	{
		$count = 0;
		$max = ceil(sqrt($n));
		for ($i = 1; $i <= $max; ++$i) {
			if ($n % $i === 0) {
				$count += 2;
			}
		}

		// Perfect square
		if ($max * $max === $n) {
			$count += 1;
		}

		return $count;
	}
}
