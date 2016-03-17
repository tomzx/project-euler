<?php

function isATriangleNumber($number)
{
	static $cache = [];
	static $lastNumberCalculated = 0;

	if (isset($cache[$number])) {
		return true;
	}

	$number = (double)$number;
	$n = $lastNumberCalculated + 1;
	while (true) {
		$x = 1/2 * $n * ($n + 1);
		$cache[$x] = $n;
		$lastNumberCalculated = $n;
		++$n;
		if ($x === $number) {
			return true;
		} else if ($x > $number) {
			return false;
		}
	}
}

// Note: This could also be solved by using a quadratic equation solver with a = 1, b = 1, c = -2*$sum
function q42()
{
	$names = file_get_contents('42.txt');
	preg_match_all('/"([^"]+)"/', $names, $matches);
	$words = $matches[1];
	$a = ord('A') - 1;
	$count = 0;
	foreach ($words as $word) {
		$sum = 0;
		foreach (str_split($word) as $character) {
			$sum += ord($character) - $a;
		}

		if (isATriangleNumber($sum)) {
			++$count;
		}
	}
	return $count;
}

echo q42();
