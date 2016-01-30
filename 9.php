<?php

// Note: not very efficient
function q9($number)
{
	for ($c = 3; $c < $number; ++$c) {
		for ($b = 2; $b < $c; ++$b) {
			for ($a = 1; $a < $b; ++$a) {
				echo $a . ' ' . $b . ' ' . $c . PHP_EOL;
				if ($a + $b + $c !== $number) {
					continue;
				}

				if ($a * $a + $b * $b === $c * $c) {
					return $a * $b * $c;
				}
			}
		}
	}
}

echo q9(1000);
