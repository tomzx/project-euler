<?php

function isPalindrome($str)
{
	return $str === strrev($str);
}

function q36($max)
{
	$sum = 0;
	for ($i = 0; $i < $max; ++$i) {
		$base2 = base_convert($i, 10, 2);
		$base10 = (string)$i;
		$isPalindromeInBase2 = isPalindrome($base2);
		$isPalindromeInBase10 = isPalindrome($base10);
		if ($isPalindromeInBase2 && $isPalindromeInBase10) {
			$sum += $i;
		}
	}
	return $sum;
}

echo q36(1000000);
