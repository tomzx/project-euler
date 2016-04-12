<?php

// It might possible to reduce the loop conditions down further
function q9($number)
{
	for ($c = 2; $c < $number; ++$c) {
		$max = $number - $c;
		for ($b = 1; $b < $max; ++$b) {
			$a = $number - $b - $c;
			if ($a * $a + $b * $b === $c * $c) {
				return $a * $b * $c;
			}
		}
	}
}

echo q9(1000);
