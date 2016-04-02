<?php

function triangleNumber($n)
{
	return $n * ($n + 1) / 2;
}

function pentagonalNumber($n)
{
	return $n * (3 * $n - 1) / 2;
}

function hexagonalNumber($n)
{
	return $n * (2 * $n - 1);
}

function q45($t, $p, $h)
{
	$px = pentagonalNumber($p);
	$tx = triangleNumber($t);
	while (true) {
		$hx = hexagonalNumber(++$h);
		$count = 1;
		while ($hx >= pentagonalNumber($p + 1)) {
			$px = pentagonalNumber(++$p);
		}

		if ($px === $hx) {
			++$count;
		}

		while ($hx >= triangleNumber($t + 1)) {
			$tx = triangleNumber(++$t);
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
