<?php

function factorial($n)
{
	$result = 1;
	for ($i = $n; $i > 1; --$i) {
		$result *= $i;
	}
	return $result;
}

function combination($n, $k)
{
	return factorial($n) / (factorial($k) * factorial($n - $k));
}

echo combination(40, 20);
