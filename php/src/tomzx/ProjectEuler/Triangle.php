<?php

namespace tomzx\ProjectEuler;

class Triangle
{
	/**
	 * @param float $a
	 * @param float $b
	 * @param float $c
	 * @return bool
	 */
	public static function isRight($a, $b, $c)
	{
		$values = [$a, $b, $c];
		sort($values);
		return ($a * $a + $b * $b) === ($c * $c);
	}

	/**
	 * @param int $p
	 * @return array
	 */
	public static function integerRightTriangleWithPerimeter($p)
	{
		$triangles = [];
		$maxA = $p - 2;
		for ($a = 1; $a <= $maxA; ++$a) {
			$maxB = $p - $a - 1;
			for ($b = $a; $b <= $maxB; ++$b) {
				$c = $p - $a - $b;
				if ($c <= $a || $c <= $b) {
					continue;
				}

				$isRightTriangle = Triangle::isRight($a, $b, $c);
				if ( ! $isRightTriangle) {
					continue;
				}

				$triangles[]  = [$a, $b, $c];
			}
		}

		return $triangles;
	}
}
