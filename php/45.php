<?php

use tomzx\ProjectEuler\Number;

require_once 'vendor/autoload.php';

function q45($t, $p, $h)
{
	$px = Number::pentagonal($p);
	$tx = Number::triangle($t);
	while (true) {
		$hx = Number::hexagonal(++$h);
		$count = 1;
		while ($hx >= Number::pentagonal($p + 1)) {
			$px = Number::pentagonal(++$p);
		}

		if ($px === $hx) {
			++$count;
		}

		while ($hx >= Number::triangle($t + 1)) {
			$tx = Number::triangle(++$t);
		}

		if ($tx === $hx) {
			++$count;
		}

		if ($count === 3) {
			return $hx;
		}
	}
}

assert(40755 === q45(1, 1, 1));
echo q45(285, 165, 143);
