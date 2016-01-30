<?php

function q3($number) {
	$factors = [];
	$i = '2';

	while ($number !== '1') {
		if (bcmod($number, $i) === '0') {
			$number = bcdiv($number, $i);
			echo '> '.$i;
			$factors[] = $i;
		} else {
			$i = bcadd($i, '1');
		}
	}

	echo PHP_EOL;
	echo 'Factors: ' . implode(', ', $factors);
	return $factors[count($factors) - 1];
}

q3('600851475143');
