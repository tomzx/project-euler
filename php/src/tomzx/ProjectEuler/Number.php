<?php

namespace tomzx\ProjectEuler;

use tomzx\ProjectEuler\Solver\IntegerFactorization;

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
		$sum = self::getProperDivisorsSum($n);
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
	public static function getDivisors($n)
	{
		$divisors = self::getProperDivisors($n);
		$divisors[] = $n;
		return $divisors;
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

	/**
	 * @param int $n
	 * @return int
	 */
	public static function getDivisorsCount($n)
	{
		$count = 0;
		$max = (int)ceil(sqrt($n));
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

	/**
	 * @param int $n
	 * @return int
	 */
	public function getProperDivisorsCount($n)
	{
		return self::getDivisorsCount($n) - 1;
	}

	/**
	 * @param int $n
	 * @return int
	 */
	public static function getDivisorsSum($n)
	{
		$sum = 0;
		$max = (int)ceil(sqrt($n));
		for ($i = 1; $i < $max; ++$i) {
			if ($n % $i === 0) {
				$sum += $i + ($n / $i);
			}
		}

		// Perfect square
		if ($max * $max === $n) {
			$sum += $max;
		}

		return $sum;
	}

	/**
	 * @param int $n
	 * @return int
	 */
	public static function getProperDivisorsSum($n)
	{
		return self::getDivisorsSum($n) - $n;
	}

	/**
	 * @param int|string $n
	 * @return bool
	 */
	public static function isPandigital($n, $length = null, $allowZero = false)
	{
		$length = $length ?: strlen($n);
		$digits = str_split($n);
		$values = array_count_values($digits);

		if ( ! $allowZero && isset($values[0])) {
			return false;
		}

		if (count($values) !== $length) {
			return false;
		}

		foreach ($values as $value) {
			if ($value > 1) {
				return false;
			}
		}

		return true;
	}

	/**
	 * @param int $n
	 * @return bool
	 */
	public static function isTruncatablePrime($n)
	{
		if ( ! IntegerFactorization::isPrime($n)) {
			return false;
		}

		$stringRepresentation = (string)$n;
		$stringRepresentationLength = strlen($stringRepresentation);
		// Left to right
		for ($i = 1; $i < $stringRepresentationLength; ++$i) {
			$number = substr($stringRepresentation, $i);
			if ( ! IntegerFactorization::isPrime($number)) {
				return false;
			}
		}

		// Right to left
		for ($i = 1; $i < $stringRepresentationLength; ++$i) {
			$number = substr($stringRepresentation, 0, $i);
			if ( ! IntegerFactorization::isPrime($number)) {
				return false;
			}
		}

		return true;
	}
}
