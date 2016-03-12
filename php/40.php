<?php

// the number 111 is constructed by 9 * 1 + 90 * 2 + 12 * 3. It lays at (223, 224, 225) and thus we'd like to know,
// when receiving the number 225, that the value is 111 and that its initial index is 223.
function numberAt($indexValue)
{
	$number = 0;
	$i = 0;
	$value = $indexValue;
	while (true) {
		$max = (9 * 10 ** $i) * ($i+1);
		$delta = min($value, $max);
		$numberDelta = ceil($delta / ($i + 1));

		$value -= $delta;
		$number += $numberDelta;

		if ($value === 0) {
			break;
		}
		++$i;
	}

	$startDelta = ($delta - 1) % ($i + 1); // return the index the number starts at, since we might be the middle of it
	$startIndex = $indexValue - $startDelta;
	return [$startIndex, $number];
}

// Using numberAt(), return the exact digital for the given index
function digitAt($value)
{
	list ($startIndex, $number) = numberAt($value);
	$index = $value - $startIndex;
	return substr($number, $index, 1);
}

function q40()
{
	// there are 9 x 1 digits numbers then
	// 99 x 2 digits numbers and so on
	$product = 1;
	foreach ([1, 10, 100, 1000, 10000, 100000, 1000000] as $value) {
		$product *= digitAt($value);
	}

	return $product;
}

echo q40();
