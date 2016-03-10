<?php

namespace tomzx\ProjectEuler\Solver;

use tomzx\ProjectEuler\Generator\Prime;

class PrimeDecomposition
{
	/**
	 * @param int $number
	 * @return int[] an array of prime => count
	 */
	public static function solve($number)
	{
		$factors = [];
		while (true) {
			if ($number <= 1) {
				break;
			}

			foreach (Prime::generator() as $prime) {
				// This probably should never happen...
				if ($prime > $number) {
					break;
				}
				if ($number % $prime === 0) {
					if ( ! isset($factors[$prime])) {
						$factors[$prime] = 0;
					}
					++$factors[$prime];
					$number /= $prime;
					break;
				}
			}
		}

		return $factors;
	}

	/**
	 * @param int $number
	 * @return array an array of prime that compose the given number
	 */
	public static function primesOnly($number)
	{
		return array_keys(self::solve($number));
	}

	/**
	 * @param int $number
	 */
	public static function isPrime($number)
	{
		$primes = self::solve($number);
		return count($primes) === 1 && array_key_exists($number, $primes);
	}
}
