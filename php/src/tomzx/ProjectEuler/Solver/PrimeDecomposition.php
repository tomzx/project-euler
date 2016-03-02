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
}
