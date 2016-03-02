<?php

namespace tomzx\ProjectEuler\Generator;

class BigPrime
{
	/**
	 * Generate a valid prime based on which php is used. Slower than the Prime generator.
	 * @return \Generator
	 */
	public static function generator()
	{
		$primes = ['2'];
		$currentNumber = '2';
		yield '2';
		while (true) {
			++$currentNumber;
			$unitNumber = (int)substr($currentNumber, -1);
			if (($currentNumber & 1) === 0) {
				continue;
			}

			$squareRoot = bcsqrt($currentNumber);

			$foundPrimeDivisor = false;
			foreach ($primes as $prime) {
				if (bccomp($prime, $squareRoot) === 1) {
					break;
				}

				if (bcmod($currentNumber, $prime) === '0') {
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
