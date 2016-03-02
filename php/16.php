<?php

function q16($number, $power)
{
	$numberString = bcpow($number, $power);
	$numberLength = strlen($numberString);
	$sum = 0;
	for ($i = 0; $i < $numberLength; ++$i) {
		$sum += (int)$numberString[$i];
	}
	return $sum;
}

//echo q16(2, 1000);
echo q16(2, 15);
