<?php

namespace tomzx\ProjectEuler\Solver;

use tomzx\ProjectEuler\Generator\Prime;

class IntegerFactorization
{
	/**
	 * Note: This function has a big weakness, that is, if you provide it with a huge prime to decompose, it'll basically
	 * have to generate all primes up to that number to discover it is prime itself...
	 * @param int $number
	 * @return int[] an array of prime => count
	 */
	public static function solve($number)
	{
		$factors = [];
		foreach (Prime::generator() as $prime) {
			// We should always end at 1
			if ($number <= 1) {
				break;
			}

			if (self::isPrime($number)) {
				$factors[$number] = 1;
				break;
			}

			if ($number % $prime !== 0) {
				continue;
			}

			if ( ! isset($factors[$prime])) {
				$factors[$prime] = 0;
			}

			// Divide the number by this factor by as many time as possible
			while ($number % $prime === 0) {
				++$factors[$prime];
				$number /= $prime;
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
		// Uses Miller-Rabin's probabilistic test
		// https://en.wikipedia.org/wiki/Miller-Rabin_primality_test
		return gmp_prob_prime($number) !== 0;
	}
}
