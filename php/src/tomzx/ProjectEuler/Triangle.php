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
	 * Given the triangle inequality (a + b > c) where a and b are the side and c the hypotenuse, and due to
	 * p = a + b + c => c = p - a - b
	 * a + b > p - a - b
	 * 2a + 2b > p
	 * a + b > p/2
	 * p/2 > c
	 * The sum of the sides must at least be half of the perimeter and the hypotenuse must be less than
	 * half of the perimeter since it is the complement of the sides.
	 * We also know that the hypotenuse of a right triangle is the longest of the 3 sides, so there is no point in
	 * testing any case where c <= b or c <= a.
	 *
	 * @param int $p
	 * @return array
	 */
	public static function integerRightTriangleWithPerimeter($p)
	{
		$triangles = [];
		$halfPerimeter = (int)ceil($p/2);
		for ($c = 1; $c <= $halfPerimeter; ++$c) {
			$sides = $p - $c;

			// Since $c is the hypotenuse, no other side may be longer. If we consider the case that another side is as
			// long as the hypotenuse, and that the third side is the "rest", this "rest" must also be smaller than the
			// hypotenuse. If it's not, then there's no point in testing it.
			if ($sides - $c > $c) {
				continue;
			}

			$halfSides = (int)ceil($sides/2);
			for ($b = 1; $b <= $halfSides; ++$b) {
				$a = $sides - $b;

				// self::isRight is inlined here because function overhead and sorting the arguments makes the bulk
				// of the time spent. Here we know that $a < $c and $b < $c so we can safely test without making sure
				// the variable are in their appropriate position in the equation.
				$isRightTriangle = ($a * $a + $b * $b) === ($c * $c);
				if ( ! $isRightTriangle) {
					continue;
				}

				$triangles[]  = [$a, $b, $c];
			}
		}

		return $triangles;
	}
}
