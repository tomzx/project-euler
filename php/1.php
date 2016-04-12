<?php

// For large values (>1000) it is more efficient to iterate through multiple of 3 and 5 than to go through all the
// values from 1 to x and test if they are % 3 or % 5 (for 1M, it was about twice as fast).
function q1()
{
	$numbers = [];

	for ($i = 0; $i < 1000; $i += 3) {
		$numbers[$i] = $i;
	}

	for ($i = 0; $i < 1000; $i += 5) {
		$numbers[$i] = $i;
	}

	return array_sum($numbers);
}

echo q1();
