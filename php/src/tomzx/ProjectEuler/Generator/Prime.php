<?php

namespace tomzx\ProjectEuler\Generator;

class Prime
{
	/**
	 * Generate a valid int(32) = 2147483647/int(64) = 9223372036854775807 prime based on which php is used.
	 * @return \Generator
	 */
	public static function generator()
	{
		$primes = [2];
		$currentNumber = 2;
		yield 2;
		while (true) {
			++$currentNumber;
			if (($currentNumber & 1) === 0) {
				continue;
			}

			$squareRoot = sqrt($currentNumber);

			$foundPrimeDivisor = false;
			foreach ($primes as $prime) {
				if ($prime > $squareRoot) {
					break;
				}

				if ($currentNumber % $prime === 0) {
					$foundPrimeDivisor = true;
					break;
				}
			}

			if ( ! $foundPrimeDivisor) {
				$primes[] = $currentNumber;
				yield $currentNumber;
			}
		}
	}
}
