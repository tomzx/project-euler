<?php

use tomzx\ProjectEuler\Generator\Prime;

require_once 'vendor/autoload.php';

function q10($number) {
	$result = '0';
	foreach (Prime::generator() as $prime) {
		if ($prime >= $number) {
			break;
		}

		$result = bcadd($result, $prime);
	}
	return $result;
}

echo q10(2000000);
