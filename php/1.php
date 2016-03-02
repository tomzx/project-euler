<?php

$numbers = array();

for ($i = 0; $i < 1000; $i += 3) {
	$numbers[] = $i;
}

for ($i = 0; $i < 1000; $i += 5) {
	if (!in_array($i, $numbers)) {
		$numbers[] = $i;
	}
}

$total = 0;
foreach ($numbers as $number) {
	$total += $number;
}

echo $total;