<?php

use tomzx\ProjectEuler\Triangle;

require_once 'vendor/autoload.php';

function q39($maxP)
{
	$p = 0;
	$max = 0;
	for ($i = 3; $i <= $maxP; ++$i) {
		$count = count(Triangle::integerRightTriangleWithPerimeter($i));
		if ($count > $max) {
			$max = $count;
			$p = $i;
		}
	}
	return $p;
}

assert(120 === q39(120));
echo q39(1000);
