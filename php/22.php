<?php

function q22()
{
	$names = file_get_contents('22.txt');
	preg_match_all('/"([^"]+)"/', $names, $matches);
	$names = $matches[1];
	$a = ord('A') - 1;
	$total = 0;
	sort($names);
	foreach ($names as $index => $name) {
		$nameValue = 0;
		foreach (str_split($name) as $letter) {
			$nameValue += ord($letter) - $a;
		}
		$total += ($index + 1) * $nameValue;
	}
	return $total;
}

echo q22();
