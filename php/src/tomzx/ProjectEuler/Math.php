<?php

namespace tomzx\ProjectEuler;

use LogicException;
use tomzx\ProjectEuler\Solver\IntegerFactorization;

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

	/**
	 * @param float $a
	 * @param float $b
	 * @param float $c
	 * @return array
	 */
	public static function solveQuadratic($a, $b, $c)
	{
		return [
			(-$b - sqrt($b*$b - 4 * $a * $c)) / (2 * $a),
			(-$b + sqrt($b*$b - 4 * $a * $c)) / (2 * $a)
		];
	}

	/**
	 * @param array $numbers
	 * @return int
	 */
	public static function leastCommonMultiple(array $numbers)
	{
		if (empty($numbers)) {
			throw new LogicException('Cannot obtain least common multiple on an empty array.');
		}

		$factors = [];
		foreach ($numbers as $number) {
			$decomposition = IntegerFactorization::solve($number);
			foreach ($decomposition as $prime => $count) {
				$factors[$prime] = isset ($factors[$prime]) ? max($factors[$prime], $count) : $count;
			}
		}

		$total = 1;
		foreach ($factors as $prime => $count) {
			$total *= $prime**$count;
		}
		return $total;
	}

	public static function greatestCommonDivisor(array $numbers)
	{
		if (empty($numbers)) {
			throw new LogicException('Cannot obtain greatest common divisor on an empty array.');
		}

		$factors = [];
		foreach ($numbers as $number) {
			$decomposition = IntegerFactorization::solve($number);
			foreach ($decomposition as $prime => $count) {
				$factors[$prime][] = $count;
			}
		}

		$total = 1;
		foreach ($factors as $prime => $counts) {
			if (count($counts) === 1) {
				continue;
			}
			sort($counts);
			$total *= $prime**$counts[0];
		}
		return $total;
	}
}
