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
		yield 2;
		yield 3;
		// Set of primes we test against
		$primes = [3];
		$currentNumber = 3;
		while (true) {
			$currentNumber += 2;
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

	/**
	 * @param int $value Included
	 * @return array
	 */
	public static function upTo($value)
	{
		return self::between(0, $value);
	}

	/**
	 * @param int $from Included
	 * @param int $to Included
	 * @return array
	 */
	public static function between($from, $to)
	{
		$generator = self::generator();
		$primes = [];
		foreach ($generator as $prime) {
			if ($prime < $from) {
				continue;
			}

			if ($prime > $to) {
				break;
			}

			$primes[] = $prime;
		}

		return $primes;
	}
}
