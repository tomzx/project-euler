<?php

function q19($from, $to)
{
	$from = DateTime::createFromFormat('Y/m/d', $from);
	$from->setTime(0, 0, 0);
	$to = DateTime::createFromFormat('Y/m/d', $to);
	$to->setTime(0, 0, 0);

	$count = 0;
	while ($from < $to) {
		if ((int)$from->format('w') === 0) {
			++$count;
		}
		$from->modify('next month');
	}
	return $count;
}

echo q19('1901/01/01', '2000/12/31');
