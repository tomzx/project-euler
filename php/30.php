<?php

function q30($power)
{
	$start = 2;
	// The limit has to do with the fact that x*9^n < 10^n, where n is the power we're analyzing. In other words,
	// at some point the sum will always be inferior to the power, making it impossible to have matches
	$end = pow(10, $power+1);
	$powerSum = 0;
	for ($i = $start; $i < $end; ++$i) {
		$numbers = str_split($i);
		$sum = 0;
		foreach ($numbers as $number) {
			$sum += pow($number, $power);
		}

		if ($i === $sum) {
//			echo $i.PHP_EOL;
			$powerSum += $i;
		}
	}

	return $powerSum;
}

assert(19316 == q30(4));
echo q30(5);
