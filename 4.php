<?php

function isPalindrome($number)
{
	$number = strval($number);
	$length = strlen($number);
	for ($i = 0; $i < $length / 2; ++$i) {
		if ($number[$i] !== $number[$length - 1 - $i]) {
			return false;
		}
	}
	return true;
}

function q4()
{
	$highestPalindrome = null;
	for ($i = 999; $i > 99; --$i) {
		for ($j = 999; $j > 99; --$j) {
			$value = $i * $j;
			if ($value < $highestPalindrome) {
				break;
			}

			if (isPalindrome($value)) {
				$highestPalindrome = $value;
			}
		}
	}
	return $highestPalindrome;
}

echo q4();
