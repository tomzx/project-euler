<?php

namespace tomzx\ProjectEuler;

class Arr
{
	/**
	 * @param int|float $scalar
	 * @param array $vector
	 * @return array
	 */
	public static function multiply($scalar, array $vector)
	{
		$newVector = [];
		foreach ($vector as $value) {
			$newVector[] = $scalar * $value;
		}
		return $newVector;
	}
}
