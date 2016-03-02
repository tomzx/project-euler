<?php

// TODO: Extract this <tom@tomrochette.com>
function fib($one, $two) {
	global $total;
	if ($one % 2 === 0) {
		$total += $one;
	}

	if ($two < 4000000) {
		fib($two, $one + $two);
	}
}

$total = 0;
fib(1, 2);
echo $total;
