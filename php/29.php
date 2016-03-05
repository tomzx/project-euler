<?php

// TODO(tom@tomrochette.com): This is a very naive way to compute the solution. However, it is most likely possible
// to determine the number of duplicates by decomposing numbers into their primes (for instance 4^2 = 2^4)
// However, for the size of this problem (100x100) and with the use of bcpow, it's much faster/easier to do it like this.
function q29($a, $b)
{
	$values = [];
	for ($i = 2; $i <= $a; ++$i) {
		for ($j = 2; $j <= $b; ++$j) {
			$value = bcpow($i, $j);
			$values[$value] = true;
		}
	}
	return count($values);
}

assert(15 === q29(5, 5));
echo q29(100, 100);
