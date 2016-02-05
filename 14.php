<?php

// Note: make sure to run this on x64 for large numbers
function q14($max)
{
	$currentMax = 0;
	$startingNumber = 1;
	for ($i = 1; $i <= $max; ++$i) {
		$length = 1;
		$number = $i;
		while ($number !== 1) {
			++$length;
			if (($number & 1) === 0) {
				$number /= 2;
			} else {
				$number = 3 * $number + 1;
			}
//			echo $number.PHP_EOL;
		}
		if ($length > $currentMax) {
			$currentMax = $length;
			$startingNumber = $i;
		}
//		echo $i.': '.$currentMax.PHP_EOL;
	}
	return [$currentMax, $startingNumber];
}

var_dump(q14(1000000));
