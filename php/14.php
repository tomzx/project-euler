<?php

// Note: make sure to run this on x64 for large numbers
function q14($max)
{
	$cache = [];
	$currentMax = 0;
	$startingNumber = 1;
	for ($i = 1; $i <= $max; ++$i) {
		$length = 1;
		$number = $i;
		while ($number !== 1) {
			if (isset($cache[$number])) {
				$length += $cache[$number] - 1;
				break;
			}

			++$length;
			if (($number & 1) === 0) {
				$number /= 2;
			} else {
				$number = 3 * $number + 1;
			}
		}

		$cache[$i] = $length;

		if ($length > $currentMax) {
			$currentMax = $length;
			$startingNumber = $i;
		}
	}
	return $startingNumber;
}

echo(q14(1000000));
