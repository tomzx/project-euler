<?php

// Knapsack problem
function q31($coins, $target)
{
	// Initialize combinations (O($target))
	$combinations = array_fill(0, $target + 1, 0);
	// Base case
	$combinations[0] = 1;
	foreach ($coins as $coin) {
		for ($i = $coin; $i <= $target; ++$i) {
			$combinations[$i] += $combinations[$i - $coin];
		}
	}

	return $combinations[$target];
}

$coins = [1, 2, 5, 10, 20, 50, 100, 200];
$target = 200;
echo q31($coins, $target);
