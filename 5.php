<?php

// not so good

function q5($number) {
	$found = false;
	$currentNumber = 0;
	
	while (!$found) {
		++$currentNumber;
		for ($i = $number; $i > 0; --$i) {
			if ($currentNumber % $i !== 0) {
				$found = false;
				break;
			}
			$found = true;
		}
	}

	echo $currentNumber;
}

q5(20);

?>