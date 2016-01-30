<?php

function calculateSumOfSquares($number)
{
	$numberToCheck = $number + 1;
	$total = 0;
	for ($i = 1; $i < $numberToCheck; ++$i) {
		$total += $i*$i;
	}
	
	return $total;
}

function calculateSquareofSum($number)
{
	$numberToCheck = $number + 1;
	$total = 0;
	for ($i = 1; $i < $numberToCheck; ++$i) {
		$total += $i;
	}
	
	$total *= $total;
	
	return $total;
}

echo calculateSquareofSum(100) . ' - ' . calculateSumOfSquares(100) . ' = ' . (calculateSquareofSum(100) - calculateSumOfSquares(100));

?>