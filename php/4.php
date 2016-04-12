<?php

use tomzx\ProjectEuler\Str;

require_once 'vendor/autoload.php';

function q4()
{
	$highestPalindrome = null;
	for ($i = 999; $i > 99; --$i) {
		for ($j = 999; $j > 99; --$j) {
			$value = $i * $j;
			if ($value < $highestPalindrome) {
				break;
			}

			if (Str::isPalindrome($value)) {
				$highestPalindrome = $value;
			}
		}
	}
	return $highestPalindrome;
}

echo q4();
