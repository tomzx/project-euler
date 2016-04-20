<?php

function q79()
{
	$keys = file_get_contents('79.txt');
	$keys = array_filter(preg_split('/\r\n|\r|\n/', $keys));

	$before = [];
	foreach ($keys as $key) {
		$digits = str_split($key);
		$a = $digits[0];
		$b = $digits[1];
		$c = $digits[2];
		$before[$a][null] = true;
		$before[$b][$a] = true;
		$before[$c][$b] = true;
	}

	$passcode = '';
	while ( ! empty($before)) {
		uasort($before, function($a, $b) {
			return count($a) <=> count($b);
		});

		$key = key($before);
		$item = $before[$key];
		unset($before[$key]);

		$passcode .= $key;
		$placedDigit = key($item);

		foreach ($before as &$digits) {
			unset($digits[$placedDigit]);
		}
	}

	return $passcode;
}

echo q79();
