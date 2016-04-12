<?php

use tomzx\ProjectEuler\Generator\Prime;

require_once 'vendor/autoload.php';

// Find the $number-th prime number
function q7($number) {
	$count = 0;
	foreach (Prime::generator() as $prime) {
		++$count;
		if ($count === $number) {
			return $prime;
		}
	}
}

assert(13 === q7(6));
echo q7(10001);
