<?php

function q13()
{
	$numbers = file_get_contents('13.txt');
	$numbers = array_filter(preg_split('/\r\n|\r|\n/', $numbers));

	$sum = 0;
	foreach ($numbers as $number) {
		$sum = bcadd($sum, $number);
	}
	return substr($sum, 0, 10);
}

echo q13();
