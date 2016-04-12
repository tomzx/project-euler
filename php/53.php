<?php

use tomzx\ProjectEuler\Math;

require_once 'vendor/autoload.php';

function q53()
{
	$count = 0;
	for ($n = 1; $n <= 100; ++$n) {
		for ($k = 0; $k <= $n; ++$k) {
			$numberOfCombinations = Math::combination($n, $k);
			if ($numberOfCombinations > 1000000) {
				++$count;
			}
		}
	}
	return $count;
}

echo q53();
