<?php

function numberToString($number)
{
	$words = [
		1    => 'one',
		2    => 'two',
		3    => 'three',
		4    => 'four',
		5    => 'five',
		6    => 'six',
		7    => 'seven',
		8    => 'eight',
		9    => 'nine',
		10   => 'ten',
		11   => 'eleven',
		12   => 'twelve',
		13   => 'thirteen',
		14   => 'fourteen',
		15   => 'fifteen',
		16   => 'sixteen',
		17   => 'seventeen',
		18   => 'eighteen',
		19   => 'nineteen',
		20   => 'twenty',
		30   => 'thirty',
		40   => 'forty',
		50   => 'fifty',
		60   => 'sixty',
		70   => 'seventy',
		80   => 'eighty',
		90   => 'ninety',
		100  => 'hundred',
		1000 => 'thousand',
	];

	$numberString = strval($number);
	$numberReversed = strrev($numberString);
	$numberLength = strlen($numberString);
	$out = [];

	// thousands
	if ($numberLength > 3) {
		$number = (int)$numberReversed[3];
		$out[] = $words[$number] . ' ' . $words[1000];
	}
	// hundreds
	if ($numberLength > 2) {
		$number = (int)$numberReversed[2];
		if ($number !== 0) {
			$out[] = $words[$number] . ' ' . $words[100];
		}
	}

	if ($numberLength > 1) {
		// 1 - 20
		$number = (int)($numberReversed[1] . $numberReversed[0]);

		if ($numberLength > 2 && $number > 0) {
			$out[] = 'and';
		}

		if ($number > 0 && $number < 20) {
			$out[] = $words[$number];
		} elseif ($number >= 20) {
			$number = (int)$numberReversed[1]*10;
			$out[] = $words[$number];
			$number = (int)$numberReversed[0];
			if ($number !== 0) {
				$out[] = $words[$number];
			}
		}
	} else {
		// 1 - 9
		$number = (int)$numberReversed[0];
		$out[] = $words[$number];
	}

	return implode(' ', $out);
}

function q17($from, $to)
{
	$length = 0;
	for ($i = $from; $i <= $to; ++$i) {
		$numberString = numberToString($i);
//		echo $i . ': ' .  . PHP_EOL;
		$numberString = str_replace(' ', '', $numberString);
		$length += strlen($numberString);
	}
	return $length;
}

echo q17(1, 1000);
