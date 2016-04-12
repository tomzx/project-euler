<?php

function q48()
{
	$sum = 0;
	for ($i = 1; $i <= 1000; ++$i) {
		$power = bcpow($i, $i);
		$sum = bcadd($sum, $power);
	}
	return substr($sum, -10);
}

echo q48();
